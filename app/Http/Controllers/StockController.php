<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockPrice;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    // Show upload form
    public function index()
    {
        return view('uploads');
    }

    // Handle file upload
  public function upload(Request $request)
{
    if (!$request->hasFile('csv')) {
        return back()->with('error', 'No file uploaded.');
    }

    $file = $request->file('csv');
    if (!$file->isValid()) {
        return back()->with('error', 'Invalid file upload.');
    }

    $path = $file->getRealPath();
    $csv = array_map('str_getcsv', file($path));
    $header = array_map('strtolower', $csv[0]);

    // to be removed after debugging
    // dd($header, $csv[1] ?? null);

    logger('CSV header:', $header);
    logger('CSV first row:', $csv[1] ?? []);

    $upload = Upload::create(['filename' => $file->getClientOriginalName()]);

    foreach (array_slice($csv, 1) as $row) {
        $rowData = array_combine($header, $row);

        $symbol = $rowData['stock'] ?? null;
        $price  = $rowData['price'] ?? null;
        $date   = $rowData['date'] ?? null;

        if ($symbol && $price && $date) {
            StockPrice::create([
                'symbol'    => $symbol,
                'price'     => $price,
                'date'      => $date,
                'upload_id' => $upload->id,
            ]);
        }
    }

    return redirect('/top-performers')->with('success', 'CSV uploaded successfully!');
}




    // Display Top 5 Performers
    public function topPerformers()
    {
        $performers = StockPrice::select('symbol')
            ->selectRaw('MAX(price) - MIN(price) as gain')
            ->groupBy('symbol')
            ->orderByDesc('gain')
            ->take(5)
            ->get();

        $labels = $performers->pluck('symbol');
        $data = $performers->pluck('gain');

        return view('top-performers', compact('labels', 'data'));
    }
}

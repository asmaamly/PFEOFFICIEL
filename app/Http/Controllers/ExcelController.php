<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Models\system;
use App\Models\stgtables;
use App\Models\datatype;
use App\Imports\ExcelImport;
use App\Models\supplements;
use App\Models\history;
use App\Models\bkey;
use App\Models\bmap;
use App\Models\bmapvalues;
use App\Models\coretables;
use App\Models\tablemapping;
use App\Models\columnmapping;
use App\Imports\CsvImport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{
    public function index()
    {
        return view('excel.index');
    }
    public function services()
    {
        return view('excel.services');
    }
    public function system()
    {
        $systems = system::all();
        return view('excel.system', compact('systems'));
    }
    public function stgtables()
    {
        $stgs = stgtables::paginate(20); // paginaye pour pagination
        return view('excel.stgtables', compact('stgs'));
    }
    public function datatype()
    {
        $datatypes = datatype::paginate(20); 
        return view('excel.datatype', compact('datatypes'));
    }
    public function supplements()
    {
        $supplementss = supplements::paginate(20); 
        return view('excel.supplements', compact('supplementss'));
    }
    public function bkey()
    {
        $bkeys = bkey::paginate(20); 
        return view('excel.bkey', compact('bkeys'));
    }
    public function bmap()
    {
        $bmaps = bmap::paginate(10); 
        return view('excel.bmap', compact('bmaps'));
    }
    public function bmapvalues()
    {
        $bmapvaluess = bmapvalues::paginate(10); 
        return view('excel.bmapvalues', compact('bmapvaluess'));
    }
    public function coretables()
    {
        $coretabless = coretables::paginate(20); 
        return view('excel.coretables', compact('coretabless'));
    }
    public function tablemapping()
    {
        $tablemappings = tablemapping::paginate(10); 
        return view('excel.tablemapping', compact('tablemappings'));
    }public function columnmapping()
    {
        $columnmappings = columnmapping::paginate(10); 
        return view('excel.columnmapping', compact('columnmappings'));
    }
    public function importexceldata(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:xls,xlsx'
            ],
        ]);
        
        $file = $request->file('import_file');
        $filename = $file->getClientOriginalName(); 
        // Récupérer le nom d'origine du fichier
        $user_id = Auth::id();
       // Enregistrer le nom du fichier dans chaque table de feuille
       system::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       stgtables::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       datatype::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       supplements::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       bkey::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       bmap::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       bmapvalues::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       coretables::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       tablemapping::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       columnmapping::whereNotNull('id')->update(['filename' => $filename, 'user_id' => $user_id]);
       
        history::create([
            'filename' => $filename,
            'imported_at' => now(),
            'user_id' => $user_id
        ]);
        // Obtenez la date et l'heure actuelles
    
        Excel::import(new ExcelImport(), $file);
       
        return redirect()->back()->with('status', 'Toutes les données ont été importées avec succès');
    }
    
   /* public function showHistory()
    {
        $history = system::orderBy('created_at', 'desc')->get();
        return view('excel.history', ['history' => $history]);
    }
    public function showByDate(Request $request)
{
    $importDate = $request->input('import_date');
    $data = system::whereDate('created_at', $importDate)->get();
    return view('historique.details', ['data' => $data, 'importDate' => $importDate]);
}
public function showFeuilleBlades($filename)
{
    // Récupérer la date d'importation de la première feuille
    $feuille1ImportDate = system::where('filename', $filename)->value('imported_at'); 
    // Récupérer la date d'importation de la deuxième feuille
    // Passer ces informations à la vue pour afficher les liens vers les blades de feuille
    return view('excel.history', ['filename' => $filename, 'feuille1ImportDate' => $feuille1ImportDate]);
}*/

public function showImportHistory()
{
    // Récupérer tous les enregistrements d'importation de la table d'historique
    $user_id = Auth::id();
    $importHistory = history::where('user_id', $user_id)->orderBy('imported_at', 'desc')->get();

    return view('excel.history', ['importHistory' => $importHistory]);
}

public function showFeuilleTabs($filename , $importDateTime)
{
  
    $importDateTime = Carbon::parse($importDateTime);
    // Récupérer les feuilles associées au fichier
    $user_id = Auth::id();
    $feuilles = system::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles2 = stgtables::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles3 = datatype::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles4 = supplements::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles5 = bkey::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles6 = bmap::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles7 = bmapvalues::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles8 = coretables::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles9 = tablemapping::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    $feuilles10 = columnmapping::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    return view('historique.feuille_blade', [
        'filename' => $filename, 
        'importDateTime' => $importDateTime->toDateTimeString(), 
        'feuilles' => $feuilles, 
        'feuilles2' => $feuilles2 ,
        'feuilles3' => $feuilles3, 
        'feuilles4' => $feuilles4,
        'feuilles5' => $feuilles5 ,
        'feuilles6' => $feuilles6, 
        'feuilles7' => $feuilles7,
        'feuilles8' => $feuilles8 ,
        'feuilles9' => $feuilles9, 
        'feuilles10' => $feuilles10,
    ]);
}
public function showFeuille1Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse( $importDateTime);
    
    $user_id = Auth::id();
    $feuille1Data = system::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();
    
    // Passer les données à la vue pour les afficher
    return view('historique.system', 
    ['feuille1Data' => $feuille1Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}
public function showFeuille2Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $user_id = Auth::id();
    $importDateTime = Carbon::parse($importDateTime);
    $feuille2Data = stgtables::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.stgtables', 
    ['feuille2Data' => $feuille2Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille3Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille3Data = datatype::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.datatype', 
    ['feuille3Data' => $feuille3Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille4Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille4Data = supplements::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.supplements', 
    ['feuille4Data' => $feuille4Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille5Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille5Data = bkey::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.bkey', 
    ['feuille5Data' => $feuille5Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille6Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille6Data = bmap::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.bmap', 
    ['feuille6Data' => $feuille6Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille7Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille7Data = bmapvalues::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.bmapvalues', 
    ['feuille7Data' => $feuille7Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille8Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille8Data = coretables::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.coretables', 
    ['feuille8Data' => $feuille8Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille9Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille9Data = tablemapping::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.tablemapping', 
    ['feuille9Data' => $feuille9Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}

public function showFeuille10Data( $filename , $importDateTime)
{
    // Récupérer les données de la feuille 1 pour la date donnée
    $importDateTime = Carbon::parse($importDateTime);
    $user_id = Auth::id();
    $feuille10Data = columnmapping::where('filename', $filename)
    ->where('imported_at', $importDateTime)
    ->where('user_id', $user_id)
    ->get();

    // Passer les données à la vue pour les afficher
    return view('historique.columnmapping', 
    ['feuille10Data' => $feuille10Data,
     'importDateTime' => $importDateTime ->toDateTimeString(),
     'filename' => $filename,
    ]);
}


/* public function showByDate($date)
    {
        $systems = System::whereDate('created_at', $date)->get();
       // $systems = System::whereTime('created_at', $date)->get();
        return view('historique.details', compact('systems'));
    }
  /*  public function showByDate($date)
{
    // Récupérer les noms uniques des feuilles pour la date donnée
    $sheetNames = System::whereDate('created_at', $date)->pluck('sheet_name')->unique();

    // Initialiser un tableau pour stocker les données de chaque feuille
    $dataBySheet = [];

    // Pour chaque nom de feuille, récupérer les données correspondantes
    foreach ($sheetNames as $sheetName) {
        switch ($sheetName) {
           case 'system':
                $dataBySheet[$sheetName] = System::whereDate('created_at', $date)
                                                  ->where('sheet_name', $sheetName)
                                                  ->get();
                break;
            case 'stgtables':
                $dataBySheet[$sheetName] = Stgtables::whereDate('created_at', $date)
                                                    ->where('sheet_name', $sheetName)
                                                    ->get();
                break;
    
            // Ajoutez d'autres cas pour chaque feuille supplémentaire si nécessaire
            default:
                // Faire quelque chose en cas de feuille inconnue
                break;
        }
    }

    return view('historique.details', compact('dataBySheet'));
}*/

    public function delete(): RedirectResponse{
        // truncate fonction qui permet de vider complètement une table de la bdd , plus rapide que la méthode delete
        system::truncate();
        bkey::truncate();
        bmap::truncate();
        bmapvalues::truncate();
        columnmapping::truncate();
        coretables::truncate();
        datatype::truncate();
        stgtables::truncate();
        supplements::truncate();
        tablemapping::truncate();
        return redirect()->back()->with('success', 'Toutes les données ont été supprimées avec succès');
    }

    

}

<x-app-layout>

    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <title>RBAM Importation</title>
        
<style>
    a {
        text-decoration: none;
        color: #337ab7;
    }
         
    /* Ajout d'un fond de page clair */
    body {
        background-color: #f9f9f9;
    }

    /* Mise en forme de la carte */
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Mise en forme du titre */
    .card-header {
        background-color: #f0f0f0;
        border-bottom: none;
        padding: 20px;
    }

    .card-header h1 {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 0;
    }

    /* Mise en forme de la ligne horizontale */
    hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 10px 0;
    }

    /* Mise en forme des onglets */
    
    /* Mise en forme du défilement des onglets */
    .scroll-nav {
        overflow-x: auto;
        white-space: nowrap;
    }

    .scroll-nav::-webkit-scrollbar {
        height: 10px;
    }

    .scroll-nav::-webkit-scrollbar-thumb {
        background-color: #ddd;
        border-radius: 5px;
    }

    .scroll-nav::-webkit-scrollbar-track {
        background-color: #f9f9f9;
    }
</style>
         
        </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>Feuilles du fichier {{ $filename }} à la date {{$importDateTime}}</h1>
                        </div>
                            <hr>
                            <div class="nav-tabs-container">
                                <ul class="nav nav-tabs scroll-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.system', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">System</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.stgtables', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">STG tables</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.datatype', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Data type</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.supplements', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Supplements</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.bkey', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BKEY</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.bmap', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BMAP</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.bmapvalues', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BMAP values</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.coretables', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Core tables</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.tablemapping', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Table mapping</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('historique.columnmapping', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Column mapping</a>
                                    </li>
                                </ul>
                          </div>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </x-app-layout>
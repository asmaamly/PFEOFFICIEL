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
    .nav-tabs-container {
        margin: 20px;
    }

    .nav-tabs-container .nav-tabs {
        border: none;
    }

    .nav-tabs-container .nav-tabs .nav-link {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        color: #333;
        font-size: 16px;
        font-weight: bold;
        margin-right: 5px;
        padding: 10px;
    }

    .nav-tabs-container .nav-tabs .nav-link:hover {
        background-color: #f0f0f0;
    }

    .nav-tabs-container .nav-tabs .nav-link.active {
        background-color: #fff;
        border-bottom: none;
        border-left: none;
        border-right: none;
        border-top: 2px solid #337ab7;
        color: #337ab7;
    }

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
    .scroll-nav .nav-link {
  white-space: nowrap;
}

.scroll-nav .nav-link {
  overflow: hidden;
  text-overflow: ellipsis;
}

.search-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}

.search-bar select {
  margin-right: 1rem;
}
        </style>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            
            <div class="card">
                <div class="card-body">
                    <hr>
                    <ul class="nav nav-tabs scroll-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.system',  ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">System</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.stgtables',  ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">STG tables</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.datatype', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Data type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.supplements', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Supplements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('historique.bkey', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BKEY</a>
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
                    
                    <div class="search-bar">
                        <select id="search-column">
                        <option value="key_domain_name">Key domain name</option>
                                                  <option value="key_set_name">Key set name</option>
                                                  <option value="key_set_id">Key set ID</option>
                                                  <option value="key_domain_id">Key domain ID</option>
                                                  <option value="physical_table">Physical table</option>
                        </select>
                        <input type="text" id="search-input" placeholder="Rechercher...">
                    </div>

                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>key domain name</th>
                                                            <th>key set name</th>
                                                            <th>key set ID</th>
                                                            <th>key domain ID</th>
                                                            <th>Physical Table</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach($feuille5Data as $item)
                                                     <tr>
                                                        <td>{{$item->key_domain_name}}</td>
                                                        <td>{{$item->key_set_name}}</td>
                                                        <td>{{$item->key_set_id}}</td>
                                                        <td>{{$item->key_domain_id}}</td>
                                                        <td>{{$item->physical_table}}</td>
                                                  </tr>
                                                   @endforeach
                                                    </tbody> 
                                                </table>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
    </x-app-layout>
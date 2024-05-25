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
                            <a class="nav-link" href="{{ route('historique.bkey', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BKEY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.bmap', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BMAP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.bmapvalues', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">BMAP values</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('historique.coretables', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Core tables</a>
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
                          <option value="table_name">Table name</option>
                          <option value="column_name">Column name</option>
                          <option value="data_type">Data type</option>
                          <option value="mandatory">Mandatory</option>
                          <option value="pk">PK</option>
                          <option value="historization_key">Historization key</option>
                          <option value="is_lookup">Is lookup</option>
                        </select>
                        <input type="text" id="search-input" placeholder="Rechercher...">
                    </div>

                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Table name</th>
                                                            <th>Column name</th>
                                                            <th>Data type</th>
                                                            <th>Mandatory</th>
                                                            <th>PK</th>
                                                            <th>Historization key</th>
                                                            <th>Is lookup</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach($feuille8Data as $item)
                                                     <tr>
                                                        <td>{{$item->table_name}}</td>
                                                        <td>{{$item->column_name}}</td>
                                                        <td>{{$item->data_type}}</td>
                                                        <td>{{$item->mandatory}}</td>
                                                        <td>{{$item->pk}}</td>
                                                        <td>{{$item->historization_key}}</td>
                                                        <td>{{$item->is_lookup}}</td>
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
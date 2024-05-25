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
                            <a class="nav-link" href="{{ route('historique.coretables', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Core tables</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('historique.tablemapping', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Table mapping</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historique.columnmapping', ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">Column mapping</a>
                        </li>
                    </ul>
                    
                </ul>
                <div class="search-bar">
                  <select id="search-column">
                  <option value="layer">Layer</option>
                  <option value="target_table_name">Target table name</option>
                  <option value="mapping_name">Mapping name</option>
                  <option value="main_source">Main source</option>
                  <option value="main_source_alias">Main source alias</option>
                  <option value="join">Join</option>
                  <option value="filter_criterion">Filter criterion</option>
                  <option value="historization_algorithm">Historization algorithm</option>
                  <option value="historization_columns">Historization columns</option>
                  <option value="main_source_alias">Main source alias</option>
                  <option value="source">Source</option>
                  <option value="remarque">Remarque</option>
                  </select>
                  <input type="text" id="search-input" placeholder="Rechercher...">
                </div>
                <div style="overflow-x: scroll;"> 
                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>layer</th>
                                                            <th>target_table_name</th>
                                                            <th>mapping_name</th>
                                                            <th>main_source</th>
                                                            <th>main_source_alias</th>
                                                            <th>join</th>
                                                            <th>filter_criterion</th>
                                                            <th>historization_algorithm</th>
                                                            <th>historization_columns</th>
                                                            <th>source</th>
                                                            <th>remarque</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach($feuille9Data as $item)
                                                     <tr>
                                                        <td>{{$item->layer}}</td>
                                                        <td>{{$item->target_table_name}}</td>
                                                       <td>{{$item->mapping_name}}</td>
                                                        <td>{{$item->main_source}}</td>
                                                         <td>{{$item->main_source_alias}}</td>
                                                        <td>{{$item->join}}</td>
                                                        <td>{{$item->filter_criterion}}</td>
                                                        <td>{{$item->historization_algorithm}}</td>
                                                         <td>{{$item->historization_columns}}</td>
                                                         <td>{{$item->source}}</td>
                                                       <td>{{$item->remarque}}</td>
                                                      
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
</div>
    </x-app-layout>
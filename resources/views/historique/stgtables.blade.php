<x-app-layout>
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
                            <a class="nav-link active" href="{{ route('historique.stgtables',  ['filename' => $filename, 'importDateTime' => $importDateTime]) }}">STG tables</a>
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

                    <div class="search-bar">
                        <select id="search-column">
                            <option value="schema">schema</option>
                            <option value="table_name">table_name</option>
                            <option value="column_name">column_name</option>
                            <option value="mandatory">mandatory</option>
                            <option value="pk">pk</option>
                            <option value="key_set_name">key_set_name</option>
                            <option value="key_domain_name">key_domain_name</option>
                            <option value="code_set_name">code_set_name</option>
                            <option value="data_type">data_type</option>
                            <option value="natural_key">natural_key</option>
                            <option value="bkey_filter">bkey_filter</option>
                            <option value="column_transformation_rule">column_transformation_rule</option>
                            <option value="remarque">remarque</option>
                          </select>
                          <input type="text" id="search-input" placeholder="Rechercher...">
                    </div>
                    <div style="overflow-x: scroll;"> 
                            <table class="table table-bordered">
                                <thead>
                                                        <tr>
                                                            <th>schema</th>
                                                            <th>Table name</th>
                                                            <th>Column name</th>
                                                            <th>Mandatory</th>
                                                            <th>PK</th>
                                                            <th>key set name</th>
                                                            <th>key domain name</th>
                                                            <th>code set name</th>
                                                            <th>code domain name</th>
                                                            <th>data type</th>
                                                            <th>natural key</th>
                                                            <th>bkey filter</th>
                                                            <th>column transformation rule</th>
                                                            <th>remarque</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($feuille2Data as $item)
                                                            <tr>
                                                                <td>{{$item->schema}}</td>
                                                                <td>{{$item->table_name}}</td>
                                                                <td>{{$item->column_name}}</td>
                                                                <td>{{$item->mandatory}}</td>
                                                                <td>{{$item->pk}}</td>
                                                                <td>{{$item->key_set_name}}</td>
                                                                <td>{{$item->key_domain_name}}</td>
                                                                <td>{{$item->code_set_name}}</td>
                                                                <td>{{$item->code_domain_name}}</td>
                                                                <td>{{$item->data_type}}</td>
                                                                <td>{{$item->natural_key}}</td>
                                                                <td>{{$item->bkey_filter}}</td>
                                                                <td>{{$item->column_transformation_rule}}</td>
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
        </div>
</x-app-layout>
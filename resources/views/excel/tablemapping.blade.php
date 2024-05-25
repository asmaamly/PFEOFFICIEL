<x-app-layout>

    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <title>Import Excel Data</title>
        
        <style>
         a {
              text-decoration: none;
              color: #337ab7;
            }
        </style>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h4>Importer des fichiers Excel </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" class="btn btn-primary">Importer</button>
                        </div>
                    </form>
                    <hr>
                    <ul class="nav nav-tabs scroll-nav">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="{{url('system')}}">System</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('stgtables')}}">STG tables</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('datatype')}}">Data type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('supplements')}}">Supplements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('bkey')}}">BKEY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('bmap')}}">BMAP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('bmapvalues')}}">BMAP values</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('coretables')}}">Core tables</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="{{route('tablemapping')}}">Table mapping</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('columnmapping')}}">Column mapping</a>
                        </li>
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
                                                        @foreach($tablemappings as $item)
                                                        @if ($item->created_at == $tablemappings->max('created_at') && $item->user_id == Auth::id())
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
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                                {{ $tablemappings->onEachSide(0)->links() }}
                                            </div>
                                                <form action="{{ route('delete') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger supp">Supprimer</button>
                                                 </form>
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
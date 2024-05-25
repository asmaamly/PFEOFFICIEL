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
                    <h4>Importation des fichiers Excel </h4>
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
                          <a class="nav-link" href="{{route('tablemapping')}}">Table mapping</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="{{route('columnmapping')}}">Column mapping</a>
                        </li>
                    </ul>
                    <div class="search-bar">
  <select id="search-column">
                            <option value="layer">Layer</option>
                            <option value="mapping_name">Mapping name</option>
                            <option value="column_name">Column name</option>
                            <option value="mapped_to_table">Mapped to table</option>
                            <option value="mapped_to_column">Mapped to column</option>
                            <option value="transformation_type">Transformation type</option>
                            <option value="transformation_rule">Transformation rule</option>
                            <option value="column">Column</option>

  </select>
  <input type="text" id="search-input" placeholder="Rechercher...">
</div>
                     
                    <div style="overflow-x: scroll;"> 
                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Layer</th>
                                                            <th>Mapping name</th>
                                                            <th>Column name</th>
                                                            <th>Mapped to table</th>
                                                            <th>Mapped to column</th>
                                                            <th>Transformation type</th>
                                                            <th>Transformation rule</th>
                                                            <th>Colonne</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($columnmappings as $item)
                                                        @if ($item->created_at == $columnmappings->max('created_at') && $item->user_id == Auth::id())
                                                            <tr>
                                                                <td>{{$item->layer}}</td>
                                                                <td>{{$item->mapping_name}}</td>
                                                                <td>{{$item->column_name}}</td>
                                                                <td>{{$item->mapped_to_table}}</td>
                                                                <td>{{$item->mapped_to_column}}</td>
                                                                <td>{{$item->transformation_type}}</td>
                                                                <td>{{$item->transformation_rule}}</td>
                                                                <td>{{$item->colonne}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                                {{ $columnmappings->onEachSide(0)->links() }}
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
</div>
    </x-app-layout>
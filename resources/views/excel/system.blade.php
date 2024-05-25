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
                          <a class="nav-link  active" aria-current="page" href="{{url('system')}}">System</a>
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
                          <a class="nav-link" href="{{route('columnmapping')}}">Column mapping</a>
                        </li>
                    </ul>
                    <div class="search-bar">
  <select id="search-column">
    <option value="source_system_id">Source System ID</option>
    <option value="schema">Schema</option>
  </select>
  <input type="text" id="search-input" placeholder="Rechercher...">
</div>
                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Source System ID</th>
                                                            <th>Schema</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($systems as $item)
                                                        @if ($item->created_at == $systems->max('created_at') && $item->user_id == Auth::id())
                                                        <!--vérifier si la date de création de l'élément est égale à la date 
                                                            de création maximale de toutes les entrées dans $systems -->
                                                            <tr>
                                                                <td>{{$item->source_system_id}}</td>
                                                                <td>{{$item->schema}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
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
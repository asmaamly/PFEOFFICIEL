<x-app-layout>

    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <title>RBAM Importation</title>
        
        <style>
            .btn.btn-primary{
                background-color: rgb(238, 81, 81);
                border-color: rgb(238, 81, 81);
            }
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
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
    
                    <div class="card">
                        <div class="card-header">
                            <h4>Importation des fichiers Excel </h4>
                        </div>
                        
                        <div class="aaa">
                            <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="input-group">
                                    <input type="file" name="import_file" class="form-control" />
                                    <button type="submit" class="btn btn-danger">Importer</button>
                                </div>
    
                            </form>
    
                            <hr>
                            <div class="nav-tabs-container">
                            <ul class="nav nav-tabs scroll-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('system')}}"> System </a>
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
                          </div>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </x-app-layout>
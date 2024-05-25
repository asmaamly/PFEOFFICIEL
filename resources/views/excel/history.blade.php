<x-app-layout>

    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <title>Import Excel Data</title>
        
        <style>
          /* Ajout d'un fond de page clair */
          body {
              background-color: #f9f9f9;
          }
      
          /* Mise en forme de la carte */
          .card-body {
              padding: 20px;
              border: 1px solid #ddd;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          
      
          /* Mise en forme du titre */
          h2 {
              color: #333;
              font-weight: bold;
              margin-bottom: 10px;
          }
      
          /* Mise en forme de la table */
          .table {
              margin-top: 20px;
          }
      
          .table thead th {
              background-color: #f0f0f0;
              border-bottom: 1px solid #ddd;
          }
      
          .table tbody tr:nth-child(even) {
              background-color: #f9f9f9;
          }
      
          .table tbody tr:hover {
              background-color: #eee;
          }
      
          /* Mise en forme des liens */
          a {
              text-decoration: none;
              color: #337ab7;
          }
      
          a:hover {
              color: #23527c;
          }
      
          /* Mise en forme des boutons de scroll */
          #scroll-to-top-button, #scroll-to-bottom-button {
              position: fixed;
              bottom: 20px;
              right: 20px;
              padding: 10px;
              border: none;
              border-radius: 50%;
              background-color: #337ab7;
              color: #fff;
              cursor: pointer;
          }
      
          #scroll-to-top-button:hover, #scroll-to-bottom-button:hover {
              background-color: #23527c;
          }
      </style>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card-body">
             <h2 class="mb-4">Historique des fichiers importés</h2>
             @if ($importHistory->isEmpty())
             <p>Aucun fichier importé n'a été trouvé.</p>
         @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom du fichier</th>
                            <th>Date d'importation</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($importHistory as $import)
                      <tr>
                        <td>
                          <a href="{{ route('feuille-tabs.show', ['filename' => $import->filename , 'importDateTime' => $import->imported_at]) }}">{{ $import->filename }}</a>
                    </td>
                          <td>{{ $import->imported_at }}</td>
                         
                      </tr>
                  @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
</div>
<script>
    const scrollToTopButton = document.getElementById('scroll-to-top-button');

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 100) {
    scrollToTopButton.style.display = 'block';
  } else {
    scrollToTopButton.style.display = 'none';
  }
});

scrollToTopButton.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});
const scrollToBottomButton = document.getElementById('scroll-to-bottom-button');

window.addEventListener('load', () => {
  scrollToBottomButton.style.display = 'block';
});

scrollToBottomButton.addEventListener('click', () => {
  const bottom = document.body.scrollHeight - window.innerHeight;
  window.scrollTo({
    top: bottom,
    behavior: 'smooth'
  });
});
    </script>
    </x-app-layout>
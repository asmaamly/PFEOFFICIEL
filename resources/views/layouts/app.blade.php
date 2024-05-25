<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RBAM Importation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
          
            body{
                background-image: url('{{asset('images/bg3.jpg')}}');
                background-size : 120%;
            }
            *{
            font-weight: bold ;
            }
            .btn.btn-danger{
                background-color: rgb(238, 81, 81);
                border-color: rgb(238, 81, 81);
                /* margin-top: 20px; */
            }
            .supp{
              margin-top: 20px;
            }
            .btn.btn-primary{
              background-color: rgb(238, 81, 81);
                border-color: rgb(238, 81, 81);
            }
            .btn.btn-primary.hover{
             color: rgb(238, 81, 81);
             border-color: rgb(238, 81, 81);  
            }
        
        main{
            
            background-size : 100% 100%;
            .scroll-nav {
             overflow-x: auto;
             height: 50px; /* Set the height of the nav container */
             white-space: nowrap; /* Prevent the nav links from wrapping */
             }

      .scroll-nav::-webkit-scrollbar {
       height: 0; /* Hide the vertical scrollbar */
      width: 0; /* Hide the horizontal scrollbar */
    }
    .scroll-nav::-webkit-scrollbar-track {
  background-color: transparent; /* Make the track transparent */
}

.scroll-nav::-webkit-scrollbar-thumb {
  background-color: transparent; /* Make the thumb transparent */
}
        .card{
            padding: 12px;
        }
        .card-header{
            background-color: white;
            text-align: center;
        }
        .aaa{
            border: none;
        }
       /* .input-group{
            width: 500px;
            align-items: center;
            margin-left: 300px;
        }*/
        .nav-tabs-container {
      width: 100%;
      overflow-x: auto;
      white-space: nowrap;
    }
    .nav-tabs {
      flex-wrap: nowrap;
      white-space: nowrap;
    }
    .nav-tabs .nav-link.active {
    background-color: rgb(238, 81, 81);
    color: #fff;
    }
    .nav-link{
     color: black;
     }
        }
        #scrollbar {
  position: fixed;
  bottom: 20px;
  left: 20px;
  width: 20px;
  height: 480px;
  background-color: rgba(0, 0, 0, 0.2);
  border-radius: 20px 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}

#scroll-track {
  position: relative;
  width: 20px;
  height: 80px;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 5px;
}
a {
              text-decoration: none;
              color: #337ab7;
          }
/* #scroll-thumb {
  position: absolute;
  top: 0;
  left: 0;
  width: 20px;
  height: 80px;
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 5px;
  transition: transform 0.2s ease-in-out;
} */

#scroll-up-button, #scroll-down-button {
  font-size: 12px;
  padding: 5px;
  border-radius: 50%;
  background-color: #333;
  color: #fff;
  cursor: pointer;
  opacity: 0.5;
}

#scroll-up-button:hover, #scroll-down-button:hover {
  opacity: 1;
}

.search-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

#search-input {
  width: 50%;
  padding: 5px;
  font-size: 16px;
  border-radius: 10px;
}

#search-column {
  width: 30%;
  padding: 5px;
  font-size: 16px;
  border-radius: 10px;
}
         
        </style>
    </head>
    
    <body class="font-sans antialiased">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
               <!-- <div id="scrollbar">
  <button id="scroll-up-button" title="Scroll up"><i class="fas fa-arrow-up"></i></button>
  <div id="scroll-track">
    <div id="scroll-thumb"></div>
  </div>
  <button id="scroll-down-button" title="Scroll down"><i class="fas fa-arrow-down"></i></button>
</div> -->
            </main>
    </body>
    <script>
      const scrollbar = document.getElementById('scrollbar');
      const scrollTrack = document.getElementById('scroll-track');
      const scrollThumb = document.getElementById('scroll-thumb');
      const scrollUpButton = document.getElementById('scroll-up-button');
      const scrollDownButton = document.getElementById('scroll-down-button');

      const pageHeight = document.documentElement.scrollHeight;
      const windowHeight = window.innerHeight;
      const maxScroll = pageHeight - windowHeight;

     let scrollPosition = 0;

     const updateScroll = () => {
       scrollPosition = window.pageYOffset;
         scrollThumb.style.transform = `translateY(${scrollPosition / maxScroll * (scrollTrack.offsetHeight - scrollThumb.offsetHeight)}px)`;
      };

     const scrollUp = () => {
       window.scrollTo({
       top: scrollPosition - windowHeight,
       behavior: 'smooth'
      });
      };

const scrollDown = () => {
  window.scrollTo({
    top: scrollPosition + windowHeight,
    behavior: 'smooth'
  });
};

scrollUpButton.addEventListener('click', scrollUp);
scrollDownButton.addEventListener('click', scrollDown);

window.addEventListener('scroll', updateScroll);
window.addEventListener('resize', updateScroll);

updateScroll();
    </script>
    
    <script>
  const table = document.querySelector('table');
const searchInput = document.querySelector('#search-input');
const searchColumn = document.querySelector('#search-column');

searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();
  const searchColumnIndex = searchColumn.selectedIndex;

  Array.from(table.rows).slice(1).forEach(row => {
    const cell = row.cells[searchColumnIndex];
    const cellText = cell.textContent.toLowerCase();

    if (cellText.includes(searchTerm)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});
</script>
</html>

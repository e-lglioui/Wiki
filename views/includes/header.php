
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
   <link rel="stylesheet" href="./assets/css/style.css">
</head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
   <a class="navbar-brand  text-light fw-bold" href="/wiki/"> Wiki <sup>TM</sup></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  d-flex  justify-content-between " id="navbarSupportedContent">
      
    <ul class="navbar-nav d-flex mb-2 justify-content-around ">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="/wiki/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#wiki">Wikies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#categories">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#tags">Tags</a>
        </li>
      </ul>
 
      <form>
      <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" oninput="search()">
       </form>
       <?php if(isset($_SESSION['loggedIn'])): ?>
   <button type="button" class="btn btn-secondary"><a href="/logout/">Logout</a></button>
<?php else: ?>
   <button type="button" class="btn btn-secondary"><a href="/login/">Login</a></button>
<?php endif; ?>

    </div>
  </div>
</nav>


<script>
// function showResult(str) {
//   if (str.length == 0) {
//     document.getElementById("livesearch").innerHTML = "";
//     document.getElementById("livesearch").style.border = "0px";
//     return;
//   }

//   var xmlhttp = new XMLHttpRequest();
//   var url = `/search?q=${str}`;
//   xmlhttp.open("GET", url, true);

//   xmlhttp.onreadystatechange = function () {
//     if (xmlhttp.readyState === 4) {
//       if (xmlhttp.status === 200) {
//         var wikis = JSON.parse(xmlhttp.responseText);

//         var livesearchContainer = document.getElementById("livesearch");

//         livesearchContainer.innerHTML = "";

//         for (var i = 0; i < wikis.length; i++) {
//           var wikiItem = document.createElement("div");
//           wikiItem.textContent = wikis[i].titre; // Adjust this based on your data structure
//           livesearchContainer.appendChild(wikiItem);
//         }

//         document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
//       } else {
//         console.error("Error: " + xmlhttp.statusText);
//       }
//     }
//   };

//   xmlhttp.send();
// }


</script>


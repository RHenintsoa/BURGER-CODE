
// pour afficher les contenus de chaque catégorie
foreach ($nameCategory as $name) {
    $listItems = $db->listMenu($name['name']);

    // affichage du titre de la catégorie
    echo '<h2 class="text-center title">' . $name['name'] . '</h2>';

    // affichage des éléments de la catégorie
    foreach ($listItems as $item) {
        echo '<div class="col-xs-6 col-md-4">
                  <div class="thumbnail">
                      <img src="http://localhost/myall/BurgerCode/photo/' . $item['image'] . '" alt="...">
                      <div class="price">' . $item['price'] . '</div>
                      <div class="caption">
                          <h4>' . $item['name'] . '</h4>
                          <p>' . $item['description'] . '</p>
                          <a href="#" class="btn btn-order" role="button"><i class="bi bi-cart2"> Commander</i></a>
                      </div>
                  </div>
              </div>';
    }
}

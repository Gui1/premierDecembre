<?php
function debug($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
function br() {
  echo '<br/>';
}
function inputCorrect($title,$titreErrors,$errors,$caraMin,$caraMax)
{
  if (!empty($title)) {
    if (strlen($title) < $caraMin) {
      $errors[$titreErrors] = 'Veuillez mettre plus de ' . $caraMin . ' caractères';
    }
    elseif (strlen($title) > $caraMax) {
      $errors[$titreErrors] = 'Veuillez mettre moins de ' . $caraMax .' caractères';
    }
    else {

    }
  } else {
    $errors[$titreErrors] = 'Veuillez renseigner ce champ';
  }
  return $errors;
}
function inputSearchCorrect($title,$titreErrors,$errors,$caraMin,$caraMax)
{
  if (!empty($title)) {
    if (strlen($title) < $caraMin) {
      $errors[$titreErrors] = 'Veuillez mettre plus de ' . $caraMin . ' caractères';
    }
    elseif (strlen($title) > $caraMax) {
      $errors[$titreErrors] = 'Veuillez mettre moins de ' . $caraMax .' caractères';
    }
    else {

    }
  } else {
    $errors[$titreErrors] = 'Saisissez quelque-chose';
  }
  return $errors;
}
function paginationIndex($page,$nbPages,$file)
{
  if ($page < 0 || $page > $nbPages) {
    header('Location: ./' . $file . '.php');
  } ?>
  <div>
    <?php
      if($page-1 > 0) {
        ?><a href="<?php echo $file ?>.php?page=<?php echo $page-1; ?>"><button type="button" name="button">Page précédente</button></a><?php
      } ?>
  </div>
  <div>
    <p>Page <?php echo $page ?> sur <?php echo $nbPages ?></p>
  </div>
  <div>
    <?php if($page+1 <= $nbPages) {
      ?><a href="<?php echo $file ?>.php?page=<?php echo $page+1; ?>"><button type="button" name="button">Page suivante</button></a><?php
    } ?>
  </div>
  <?php
}
function paginationSingle0($id,$nbArticles,$page,$nbPages,$file,$idPre,$idNext)
{
  if ($id < 0 || $id > $nbArticles) {
    header('Location: ./' . $file . '.php&id=' . $id);
  } else { ?>
  <div>
    <?php
      if(!empty($idNext)) {
        ?><a href="<?php echo $file ?>.php?id=<?php echo $idNext['id']; ?>"><button type="button" name="button">Page précédente</button></a><?php
      } ?>
  </div>
  <div>
    <div>
      <p>Article <?php echo $page ?> sur <?php echo $nbPages ?></p>
    </div>
  </div>
  <div>
    <?php if(!empty($idPre)) {
      ?><a href="<?php echo $file ?>.php?id=<?php echo $idPre['id']; ?>"><button type="button" name="button">Page suivante</button></a><?php
    } ?>
  </div>
  <?php
  }
}
function paginationSingle($id,$nbArticles,$file,$idPre,$idNext,$articles)
{
  if ($id < 0 || $id > $nbArticles) {
    header('Location: ./' . $file . '.php&id=');
  } ?>
  <div>
    <?php
      if(!empty($idPre)) {
        ?><a href="<?php echo $file ?>.php?id=<?php echo $idPre['id']; ?>"><button type="button" name="button">Page précédente</button></a><?php
      } ?>
  </div>
  <div>
    <div>
      <div>
        <?php foreach ($articles as $key => $id) { ?>
          <a href="<?php echo $file ?>.php?id=<?php echo $id['id']; ?>"><button type="button" name="button"><?php echo $key+1 ?></button></a><?php
        } ?>
      </div>
    </div>
  </div>
  <div>
    <?php if(!empty($idNext)) {
      ?><a href="<?php echo $file ?>.php?id=<?php echo $idNext['id']; ?>"><button type="button" name="button">Page suivante</button></a><?php
    } ?>
  </div>
  <?php
}
function numeroDernierArticle($page,$nbArticles,$perpage)
{
  if ($page*$perpage > $nbArticles) {
    return $nbArticles;
  }
  else {
    return $page*$perpage;
  }
}
?>

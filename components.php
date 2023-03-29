<?php


function cardpn($movieimg, $movieid){
$element ='
<div class="col-md-4 mb-4">
<div class="card shadow border-0 h-100">
          <a href="more.php?morepn='.$movieid.'"><img src="' .$movieimg. '" class="card-img-top"></a>
          <div class="middle">
          <a href="more.php?morepn='.$movieid.'"><button type="button" class="btn btn-light">More</button></a>
          </div>
        </div>
        </div>';
echo $element;
}

function cardcu($movieimg, $movieid){
    $element ='
    <div class="col-md-4 mb-4">
    <div class="card shadow border-0 h-100">
              <a href="more.php?morecu='.$movieid.'"><img src="' .$movieimg. '" class="card-img-top"></a>
              <div class="middle">
              <a href="more.php?morecu='.$movieid.'"><button type="button" class="btn btn-light">More</button></a>
              </div>
            </div>
            </div>';
    echo $element;
}


function editCardpn($movieimg, $movieid){
  $element='
  <div class="col-md-4 mb-4">
<div class="card shadow border-0 h-100">
          <a><img src="' .$movieimg. '" class="card-img-top"></a>
          <div class="middle">
          <a href="delete_check.php?idpn='.$movieid.'" data-toggle="modal" data-target="#confirm-delete"><button type="button" class="btn btn-light" style="margin: 7; background: #FF0000";>DELETE</button></a>
          <a href="change_info.php?editpn='.$movieid.'"><button type="button" class="btn btn-light" style="margin: 7; background: #2499FF  ";>EDIT</button></a>
          </div>
        </div>
        </div>
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete Movie
            </div>
            <div class="modal-body">
                Are you sure u want to delete the movie?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="delete_check.php?idpn='.$movieid.'" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>';

echo $element;
}

function editCardcu($movieimg, $movieid){
    $element2='
    <div class="col-md-4 mb-4">
  <div class="card shadow border-0 h-100">
            <a><img src="' .$movieimg. '" class="card-img-top"></a>
            <div class="middle">
            <a href="delete_check.php?idcu='.$movieid.'" data-toggle="modal" data-target="#confirm-delete2"><button type="button" class="btn btn-light" style="margin: 7; background: #FF0000";>DELETE</button></a>
            <a href="change_info.php?editcu='.$movieid.'"><button type="button" class="btn btn-light" style="margin: 7; background: #2499FF  ";>EDIT</button></a>
            </div>
          </div>
          </div>
          <div class="modal fade" id="confirm-delete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  Delete Movie
              </div>
              <div class="modal-body">
                  Are you sure u want to delete the movie?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <a href="delete_check.php?idcu='.$movieid.'" class="btn btn-danger btn-ok">Delete</a>
              </div>
          </div>
      </div>
  </div>';
  
  echo $element2;
  }


?>
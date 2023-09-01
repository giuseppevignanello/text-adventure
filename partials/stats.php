 <div class="d-flex justify-content-end gap-3">
     <div> Life Points: <?php echo $hero->getCharacterData("lifePoints") ?> </div>
     <div>
         Attack: <?php echo $hero->getCharacterData("attack") ?> </div>
     <div>
         Defense: <?php echo $hero->getCharacterData("defense") ?>
     </div>
 </div>
 <div class="d-flex justify-content-end">
     <!-- Button trigger modal -->
     <button type="button" class="my-2 hacking_green_bg border-0" data-bs-toggle="modal"
         data-bs-target="#checkYourkPocketsModal">
         Check Your Pockets
     </button>
     <!-- Modal -->
     <div class="modal fade" id="checkYourkPocketsModal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content bg-black">
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalTitleId">The contents of your pockets</h5>
                     <button type="button" class="btn-close hacking_green_bg" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="container-fluid">
                         <ul>
                             <?php
                                if ($noClothes) {
                                    echo "<li> You have no pockets, your clothes are on the beach </li>";
                                } else {
                                    foreach ($hero_inventory as $i => $item) {
                                        echo "<li class='d-flex' > <div id='item{$i}'>{$item} </div> </li>";
                                    }
                                }
                                ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- end hero stats -->
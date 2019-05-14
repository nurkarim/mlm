  <?php
  $k=0;
  ?>
  <ul>
  	@for(; $k<4;$k++)
     <li>
                             <a href="#" style="color: black" data-toggle="modal" data-target="#modal" onclick="loadModal('{{route('addMatrix4x3.create',$user)}}')">

                                    <div class="container-fluid">
                                        <div class="text-center" >
                                            <i class="fa fa-user fa-2x user-icon"></i>
                                        </div>
                                        <div class="">
                                         <i class="fa fa-plus"></i>
                                        </div>
                                        
                                        
                                    </div>

                                </a>
                            
                            </li>
                            @endfor
                        </ul>
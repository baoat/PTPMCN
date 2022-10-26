
<nav aria-label="..." class="vtphantrang">
  <ul class="pagination">
  	<?php
	if($trang!=1){
		?>
		<li class="page-item">
      		<a class="page-link" href='?show=<?php echo $tentrang;?>&trang=<?php echo $trang-1;?>'><<</a>
    	</li>
    <?php }?>
    <?php
	
	for($i=1;$i<=$sotrang;$i++){
		if($i==$trang){

    	echo "<li class='page-item active' aria-current='page'>
      			<a class='page-link' href='?show={$tentrang}&trang={$i}''>".$i."</a>
    		</li>";
    	}
    	else
    	{
    		echo "<li class='page-item'><a class='page-link' href='?show={$tentrang}&trang={$i}'>".$i."</a></li>";
    	}
    }
    if($trang!=$sotrang){
		?>
    <li class="page-item">
      <a class="page-link" href='?show=<?php echo $tentrang;?>&trang=<?php echo $trang+1;?>'>>></a>
    </li>
    <?php }?>
  </ul>
</nav>
<?php 

if (isset($_SESSION["tipo"])) {
	if ($_SESSION["tipo"] == 'alumno') {
?>
			<a class="btn-userMenu rounded" data-pushbar-target="client-menu"><span class="icon-list-bullet"></span></a>


<?php
	} elseif ($_SESSION["tipo"] == 'instructor') {
?>
			<a class="btn-userMenu rounded" data-pushbar-target="instructor-menu"><span class="icon-list-bullet"></span></a>


<?php
	} elseif ($_SESSION["tipo"] == 'administrador') {
?>
			<a class="btn-userMenu rounded" data-pushbar-target="instructor-menu"><span class="icon-list-bullet"></span></a>
<?php
	}
}

?>
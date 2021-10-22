<?php 
if (count(get_included_files()) == 1)
{
	header('Location: index.php?url=login');
	die();
}
?>

<footer>
    <div class="bg-dark">
    </div>
</footer>

<script src="vista/recursos/bootstrap/js/bootstrap.js"></script>

<?php unset($_SESSION['mensaje']); ?>
<?php unset($_SESSION['error']); ?>
<h2>Update Data User</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Menu -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=user&file=select">Kembali</a>

<hr class="my-1">

<?php
	$iduser = $_GET["id"];
	$user = $database->query_select("SELECT * FROM user WHERE iduser = $iduser");
?>

<!-- Table form untuk menyisipkan data baru -->
<table class="table-sm mt-3 mb-1">
	<form acton="" method="post">
		<!-- iduser -->
		<input type="hidden" name="iduser" value="<?= $iduser ?>">

		<!-- User -->
		<tr>
			<td><label for="user">User</label></td>
			<td>: <input type="text" name="user" id="user" value="<?= $user[0]["user"] ?>" placeholder="<?= $user[0]["user"] ?>" required></td>
		</tr>
		
		<!-- Email -->
		<tr>
			<td><label for="email">Email</label></td>
			<td>: <input type="email" name="email" id="email" value="<?= $user[0]["email"] ?>" placeholder="<?= $user[0]["email"] ?>" required></td>
		</tr>

		<!-- Password -->
		<tr>
			<td><label for="password">Password</label></td>
			<td>: <input type="password" name="password" id="password" required></td>
		</tr>

		<!-- Posisi -->
		<tr>
			<td><label for="posisi">Posisi</label></td>
			<td>:
				<select name="posisi" id="posisi" required>
					<option value="admin" <?= ($user[0]["posisi"] == "admin") ? "selected" : "" ; ?> >Admin</option>
					<option value="koki" <?= ($user[0]["posisi"] == "koki") ? "selected" : "" ; ?> >Koki</option>
					<option value="kasir" <?= ($user[0]["posisi"] == "kasir") ? "selected" : "" ; ?> >Kasir</option>
				</select>
			</td>
		</tr>
		
		<!-- Tombol Submit -->
		<tr>
			<td><button type="submit" name="simpan" class="btn btn-outline-primary btn-sm py-0 mt-3">Simpan</button></td>
		</tr>
	</form>
</table>

<?php
	if ( isset($_POST["simpan"]) )
	{
		$iduser = $_POST["iduser"];
		$user = htmlspecialchars($_POST["user"]);
		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);
		$password = hash( 'sha256', $password );
		$posisi = $_POST["posisi"];

		$queryInsert = "UPDATE user SET user = '$user', email = '$email', password = '$password', posisi = '$posisi' WHERE iduser = $iduser";

		if ( $database->query_insert($queryInsert) >= 0 )
		{
			echo "<br>Query Ok!<br>"; 
		}
		else
		{
			echo "Query Failed<br>";
			echo mysqli_error($database->conn);
			echo '<hr><a type="button" class="btn btn-outline-dark btn-sm mx-1 my-2" href="?dir=menu&file=insert">Refresh</a><hr>';
		}
	}
?>
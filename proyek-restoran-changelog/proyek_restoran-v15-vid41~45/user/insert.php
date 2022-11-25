<h2>Tambah Data</h2>
<hr class="my-1">

<!-- Tombol Kembali ke Daftar Menu -->
<a type="button" class="btn btn-outline-dark btn-sm py-0 m-1" href="?dir=user&file=select">Kembali</a>

<hr class="my-1">

<!-- Table form untuk menyisipkan data baru -->
<table class="table-sm mt-3 mb-1">
	<form acton="" method="post">
		<!-- User -->
		<tr>
			<td><label for="user">User</label></td>
			<td>: <input type="text" name="user" id="user" placeholder="Ketik nama user" required></td>
		</tr>
		
		<!-- Email -->
		<tr>
			<td><label for="email">Email</label></td>
			<td>: <input type="email" name="email" id="email" placeholder="Ketik email" required></td>
		</tr>

		<!-- Password -->
		<tr>
			<td><label for="password">Password</label></td>
			<td>: <input type="password" name="password" id="password" placeholder="Ketik password" required></td>
		</tr>

		<!-- Posisi -->
		<tr>
			<td><label for="posisi">Posisi</label></td>
			<td>:
				<select name="posisi" id="posisi" required>
					<option value="admin" selected>ADMIN</option>
					<option value="koki">KOKI</option>
					<option value="kasir">KASIR</option>
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
		$user = htmlspecialchars($_POST["user"]);
		$user = strtolower($user);
		$user = stripslashes($user);

		$email = htmlspecialchars($_POST["email"]);
		$password = htmlspecialchars($_POST["password"]);
		$posisi = $_POST["posisi"];

		$queryInsert = "INSERT INTO user VALUES ('', '$user', '$email', '$password', '$posisi', 1)";

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
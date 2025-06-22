<h2>Add User</h2>
<a class="new" href="index.php?page=user_list.php">User list</a>
		<form action="index.php?page=user_add.php"? method="POST">
				<label>Username</label>
				<input type="text" name="username" />

				<label>Password</label>
				<input type="text" name="password"/>

				<label>Email</label>
				<input type="text" name="email" />

				<label>Role</label>

				<select name="role">
				<option value="Staff">Staff</option>
                <option value="Clientuser">Client User</option>
				</select>


				<input type="submit" name="submit" value="Add" />

			</form>
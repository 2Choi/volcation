<?php
echo '<header>
	<div class="container">
		<ul class="top-menu">
			<!-- <li></li> -->
			<li>볼케이션</li>
		</ul>
		<ul class="top-menu right">';
			if( $user->is_logged_in() ) {
				echo "<a href='index.php?logout=true'>";
				echo "<li>로그아웃</li>";
				echo "</a>";
			} else {
				echo "<a href='login.php'>";
				echo "<li>로그인</li>";
				echo "</a>";
			}
			echo '
			<li>마일리지</li>
		</ul>
	</div>
</header>';
?>

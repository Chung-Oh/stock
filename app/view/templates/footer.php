	<footer class="foot"><a href="https://github.com/Chung-Oh" target="_blank">&copy Daniel Chung</a></footer>
	<script type="text/javascript">
		// Ocultar input na Home, Sessão Usuário e Redefinição
		(function showSearchBox() {
			const navBar = document.querySelectorAll(".page-action");
			(window.location.pathname == "/app/view/home.php" 
				|| window.location.pathname == "/app/view/user.php"
				|| window.location.pathname == "/app/view/redefine.php")
			? navBar[3].style.display="none"
			: null;
		})();
	</script>
	<script type="module" src="../js/helpers/fade-elements.js"></script>
	<script type="module" src="../js/helpers/msg-empty.js"></script>
	<script type="module" src="../js/helpers/table-order.js"></script>
	<script type="module" src="../js/helpers/select.js"></script>
	<script type="module" src="../js/helpers/services.js"></script>
	<script type="module" src="../js/nav-bar-button.js"></script>
	<script type="module" src="../js/msg-session.js"></script>
	<script type="module" src="../js/search-box.js"></script>
	<script type="module" src="../js/table-listens.js"></script>
	<script type="module" src="../js/form-create.js"></script>
	<script type="module" src="../js/form-edit.js"></script>
	<script type="module" src="../js/form-delete.js"></script>
	<script type="module" src="../js/form-user.js"></script>
	<script type="module" src="../js/form-redefine.js"></script>
	<script type="module" src="../js/button-panel.js"></script>
	<script type="module" src="../js/footer-btn-top.js"></script>
</body>
</html>
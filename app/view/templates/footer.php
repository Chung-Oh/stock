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
	<!-- build:js -->
	<script type="module" src="../es6/helpers/fade-elements.js"></script>
	<script type="module" src="../es6/helpers/msg-empty.js"></script>
	<script type="module" src="../es6/helpers/table-order.js"></script>
	<script type="module" src="../es6/helpers/select.js"></script>
	<script type="module" src="../es6/helpers/services.js"></script>
	<script type="module" src="../es6/nav-bar-button.js"></script>
	<script type="module" src="../es6/msg-session.js"></script>
	<script type="module" src="../es6/search-box.js"></script>
	<script type="module" src="../es6/table-listens.js"></script>
	<script type="module" src="../es6/form-create.js"></script>
	<script type="module" src="../es6/form-edit.js"></script>
	<script type="module" src="../es6/form-delete.js"></script>
	<script type="module" src="../es6/form-user.js"></script>
	<script type="module" src="../es6/form-redefine.js"></script>
	<script type="module" src="../es6/button-panel.js"></script>
	<script type="module" src="../es6/footer-btn-top.js"></script>
	<!-- endbuild -->
</body>
</html>
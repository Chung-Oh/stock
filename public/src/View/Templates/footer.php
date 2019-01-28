	<footer class="foot"><a href="https://github.com/Chung-Oh" target="_blank">&copy Daniel Chung</a></footer>
	<script type="text/javascript">
		// Ocultar input na Home
		(function showSearchBox() {
			const navBar = document.querySelectorAll(".page-action");
			(window.location.pathname == "/src/View/home.php" 
				|| window.location.pathname == "/src/View/user.php")
			? navBar[3].style.display="none"
			: null;
		})();
	</script>
	<script type="module" src="../../app/js/helpers/fade-elements.js"></script>
	<script type="module" src="../../app/js/helpers/msg-empty.js"></script>
	<script type="module" src="../../app/js/helpers/table-order.js"></script>
	<script type="module" src="../../app/js/helpers/select.js"></script>
	<script type="module" src="../../app/js/nav-bar-button.js"></script>
	<script type="module" src="../../app/js/msg-session.js"></script>
	<script type="module" src="../../app/js/search-box.js"></script>
	<script type="module" src="../../app/js/table-listens.js"></script>
	<script type="module" src="../../app/js/form-create.js"></script>
	<script type="module" src="../../app/js/form-edit.js"></script>
	<script type="module" src="../../app/js/form-delete.js"></script>
	<script type="module" src="../../app/js/form-user.js"></script>
	<script type="module" src="../../app/js/button-panel.js"></script>
	<script type="module" src="../../app/js/footer-btn-top.js"></script>
</body>
</html>
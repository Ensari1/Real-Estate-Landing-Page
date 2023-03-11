// This code is just a placeholder to demonstrate how JavaScript can be used on the dashboard

const links = document.querySelectorAll('.sidebar a');

links.forEach(link => {
	link.addEventListener('click', () => {
		// Hide all widgets
		document.querySelectorAll('.widget').forEach(widget => {
			widget.style.display = 'none';
		});
		// Show the selected widget
		const widgetId = link.getAttribute('href').substring(1);
		document.getElementById(widgetId).style.display = 'block';
	});
});

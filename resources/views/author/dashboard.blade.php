<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="\css\dashboard.css">
</head>
<body>
<div class="wrap">

        <x-layots/>       
        <x-authorsidebar/>
        
    <div class="main">
            <img src="/images/nav.jpg" alt="error loading" width="106%" height="580px">
    </div>
</div>
<div id="footer"></div>
<script src="/js/jquery.min.js"></script>
<script>
$(function(){
    // Load footer
    $('#footer').load('/path/to/footer.html');
});
</script>
</body>
</html>
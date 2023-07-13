</div>
<footer class="py-3 my-4 ">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">About</a></li>
    </ul>
    <p class="text-center text-secondary">© 2023 Company, Inc</p>
</footer>
</div>
<script>
    window.addEventListener('load', () => {
        document.getElementById('countprod').innerHTML = JSON.parse(localStorage.getItem('keyCart')).length;
    })






</script>
</body>

</html>

<script>
function PrintPage() {
window.print();
}
document.loaded = function(){

}
window.addEventListener('DOMContentLoaded', (event) => {
PrintPage()
setTimeout(function(){ window.close() },750)
});
</script>

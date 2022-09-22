<?php
$conn = new mysqli('localhost', 'root', '', 'phppot_examples');
if (! empty($_POST["keyword"])) {
    $sql = $conn->prepare("SELECT nome FROM tb_nadadores WHERE nome LIKE  ? ORDER BY nome LIMIT 0,6");
    $search = "{$_POST['keyword']}%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();
    if (! empty($result)) {
        ?>
<ul id="country-list">
<?php
        foreach ($result as $country) {
            ?>
   <li onClick="selectCountry('<?php echo $country["nome"]; ?>');">
      <?php echo $country["nome"]; ?>
    </li>
<?php
        }// end for
    ?>
</ul>
    <?php
    }// end if not empty
}
?>
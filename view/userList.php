<!-- template lista utente -->
<?php 
    // ordine a livello di query
    $orderDirClass = $orderDir;
    $orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>
<table class="table table-striped"> <!-- tabella di visualizzazione dati user estratti dal db-->
<caption>USERS LIST</caption>
    <thead>
        <tr>
            <!--ordina per direzione e grandezza -->
            <th class="<?= $orderBy === 'id' ? $orderDirClass : '' ?>"><a href="<?=$page?>?orderBy=id&orderDir=<?= $orderDir ?>">ID</a></th>
            <th class="<?= $orderBy === 'user_name' ? $orderDirClass : '' ?>"><a href="<?=$page?>?orderBy=user_name&orderDir=<?= $orderDir ?>">Name</a></th>
            <th class="<?= $orderBy === 'fiscalcode' ? $orderDirClass : '' ?>"><a href="<?=$page?>?orderBy=fiscalcode&orderDir=<?= $orderDir ?>">Fiscal code</a></th>
            <th class="<?= $orderBy === 'email' ? $orderDirClass : '' ?>"><a href="<?=$page?>?orderBy=email&orderDir=<?= $orderDir ?>">Email</a></th>
            <th class="<?= $orderBy === 'age' ? $orderDirClass : '' ?>"><a href="<?=$page?>?orderBy=age&orderDir=<?= $orderDir ?>">Age</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        // lista utenti estratti 
        if($users): 
            foreach($users as $user): ?>
                    <tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user["user_name"] ?></td>
                        <td><?= $user["fiscalcode"] ?></td>
                        <td><a href="mailto:<?=$user["email"] ?>"><?= $user["email"] ?></a></td>
                        <td><?= $user["age"] ?></td>
                    </tr>
        <?php
            endforeach;
        else:
            echo "<tr><td colspan='5'><h2 class='text-center'>No Records found!</h2></td></tr>";
        endif;
        ?>
    </tbody>
</table>
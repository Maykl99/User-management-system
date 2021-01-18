<?php $page = $_SERVER['PHP_SELF']; ?>
<table class="table table-striped">
<caption>USERS LIST</caption>
    <thead>
        <tr>
            <th><a href="<?=$page?>?orderBy=id">ID</a></th>
            <th><a href="<?=$page?>?orderBy=user_name">Name</a></th>
            <th><a href="<?=$page?>?orderBy=fiscalcode">Fiscal code</a></th>
            <th><a href="<?=$page?>?orderBy=email">Email</a></th>
            <th><a href="<?=$page?>?orderBy=age">Age</a></th>
        </tr>
    </thead>
    <tbody>
        <?php
        
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
<caption>USERS LIST</caption>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Fiscal code</th>
            <th>Email</th>
            <th>Age</th>
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
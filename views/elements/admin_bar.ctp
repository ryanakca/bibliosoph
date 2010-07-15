<div id="actions">
        <table>
        <thead>
            <tr>
                <th colspan="4">Navigation</th>
            </tr>
        </thead>
        <tfoot>
            <!-- Before tbody! -->
            <tr>
                <td colspan="4">
                    <?php echo $html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout'));?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <th>Authors</th> <th>Aliases</th> <th>Papers</th> <th>Uploads</th>
            </tr>
            <tr>
                    <td><?php echo $html->link(__('Index', true), array('controller'=>'authors', 'action'=>'index'));?></td>
                    <td><?php echo $html->link(__('Index', true), array('controller'=>'aliases', 'action'=>'index'));?></td>
                    <td><?php echo $html->link(__('Index', true), array('controller'=>'papers', 'action'=>'index'));?></td>
                    <td><?php echo $html->link(__('Index', true), array('controller'=>'uploads', 'action'=>'index'));?></td>
            </tr>
            <tr>
                    <td><?php echo $html->link(__('Add', true), array('controller'=>'authors', 'action'=>'add'));?></td>
                    <td><?php echo $html->link(__('Add', true), array('controller'=>'aliases', 'action'=>'add'));?></td>
                    <td><?php echo $html->link(__('Add', true), array('controller'=>'papers', 'action'=>'add'));?></td>
                    <td><?php echo $html->link(__('Add', true), array('controller'=>'uploads', 'action'=>'add'));?></td>
            </tr>
        </tbody>
        </table>
</div>

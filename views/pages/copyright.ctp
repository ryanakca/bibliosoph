<div class="pages">
<h2>Copyright and Legal</h2>
<p>The reports contained in these Internet-accessible directories are included by the contributing authors as a mechanism to ensure timely dissemination of scholarly and technical information on a non-commerical basis. <a href="http://www.faqs.org/faqs/law/copyright/faq/">Copyright</a> and all rights therein are maintained by the authors, despite their having offered this information electronically. Everyone copying this information must adhere to the terms and constraints invoked by each author's copyright.</p>

<p>Reports may not be copied for commercial redistribution, republication, or dissemination without the explicit permission of the <a href="http://cs.queensu.ca">School of Computing</a> at <a href="http://queensu.ca">Queen's University</a> and the authors.</p>
<pre>
    Bibliosoph is a web-based technical reports manager.
    Copyright &copy; 2009 Ryan Kavanagh

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see &lt;<a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>&gt;.</p>

    You may obtain Bibliosoph's source by running:
        git clone git://github.com/ryanakca/bibliosoph.git

    The above git repository may not include the modifications made for this
    Biblosoph installation. It is up to this network server's operator to
    provide the source code of the modified version running on this network
    server.

</pre>

<p>To obtain the latest modifications to the source code hosted on this server, run:</p>
<pre>
    git clone <?php if ($_SERVER['SERVER_PORT'] == '80') { echo 'http://'; } else { echo 'https://'; } echo $_SERVER['HTTP_HOST'] . $html->webroot . '.git/'; ?>
</pre>
</div>

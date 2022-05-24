                    <div class="searchFuncties_div">
                        <!-- Zoek functie om accounts op basis van welke rechten elk account heeft te sorteren. -->
                        <form action="admin" method="get">
                            <label for="status" class="textDarkColor">Filter:&nbsp;</label>
                            <select class="browser-default custom-select mb-4 textDarkColor" name="status" id="searchStatusFuncties" onchange="status()">
                                <option value="" disabled>Kies een optie</option>
                                <?php
                                    switch($_GET["status"]){
                                        default:
                                        case "searchAll":
                                            echo "<option value=\"searchAll\" selected>Zoek op alle gebruikers</option>";
                                            echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                            echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                            echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                            echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                            break;
                                        case "searchUsers":
                                            echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                            echo "<option value=\"searchUsers\" selected>Zoek op Users</option>";
                                            echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                            echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                            echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                            break;
                                        case "searchMods":
                                            echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                            echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                            echo "<option value=\"searchMods\" selected>Zoek op Moderators</option>";
                                            echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                            echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                            break;
                                        case "searchAdmins":
                                            echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                            echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                            echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                            echo "<option value=\"searchAdmins\" selected>Zoek op Admins</option>";
                                            echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                            break;
                                        case "searchModsEnAdmins":
                                            echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                            echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                            echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                            echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                            echo "<option value=\"searchModsEnAdmins\" selected>Zoek op Moderators en Admins</option>";
                                            break;
                                        case "":
                                            header("location:admin?status=searchAll&order=" . $_GET['order']);
                                    }
                                ?>
                            </select>
                            <select class="browser-default custom-select mb-4 textDarkColor" name="order" onchange="order()">
                                <option value="" disabled>Kies een optie</option>
                                <?php
                                    switch($_GET["order"]){
                                        default:
                                        case "joinDate":
                                            echo "<option value=\"joinDate\" selected>Username op Id</option>";
                                            echo "<option value=\"A-Z\">Username van A-Z</option>";
                                            echo "<option value=\"Z-A\">Username van Z-A</option>";
                                            break;
                                        case "A-Z":
                                            echo "<option value=\"joinDate\">Username op Id</option>";
                                            echo "<option value=\"A-Z\" selected>Username van A-Z</option>";
                                            echo "<option value=\"Z-A\">Username van Z-A</option>";
                                            break;
                                        case "Z-A":
                                            echo "<option value=\"joinDate\">Username op Id</option>";
                                            echo "<option value=\"A-Z\">Username van A-Z</option>";
                                            echo "<option value=\"Z-A\" selected>Username van Z-A</option>";
                                            break;
                                        case "":
                                            header("location:admin?status=" . $_GET["status"] . "&order=A-Z");
                                    }
                                    // if(isset($_GET["username"])){
                                    //     echo "<input type=\"text\" name=\"username\" maxlength=\"20\" style=\"margin-left: 5px; height: 25px;\" value=\"" . htmlspecialchars($_GET['username']) . "\" placeholder=\"zoek op username\">";
                                    // }else{
                                    //     echo "<input type=\"text\" name=\"username\" maxlength=\"20\" style=\"margin-left: 5px; height: 25px;\" placeholder=\"zoek op username\">";
                                    // }
                                ?>
                                <input type="submit" value="Zoek Op" style="margin-left: 5px;width: 250px;">
                            </select>
                        </form>
                    </div>
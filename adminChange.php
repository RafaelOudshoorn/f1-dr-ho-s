                    <div class="searchFuncties_div">
                        <!-- Zoek functie om accounts op basis van welke rechten elk account heeft te sorteren. -->
                        <label for="searchStatusFuncties" class="textDarkColor">Zoek op:&nbsp;</label>
                        <select class="browser-default custom-select mb-4 textDarkColor" name="searchStatusFuncties" id="searchStatusFuncties" onchange="val()">
                            <option value="" disabled>Kies een optie</option>
                            <?php
                                switch($_GET["search"]){
                                    default:
                                    case "searchAll":
                                        echo "<option value=\"searchAll\" selected>Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::select();
                                        break;
                                    case "searchUsers":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\" selected>Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(0);
                                        break;
                                    case "searchMods":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\" selected>Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(1);
                                        break;
                                    case "searchAdmins":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\" selected>Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(2);
                                        break;
                                    case "searchModsEnAdmins":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\" selected>Zoek op Moderators en Admins</option>";
                                        $num = "1||2";
                                        $select = userManager::selectOnAdmin($num);
                                        break;
                                    case "":
                                        header("location:admin?search=searchAll");
                                }
                            ?>
                        </select>
                    </div>  
                    <script>
                        $('#searchStatusFuncties').change(function(){
                            window.location.href = "admin?search=" + $(this).val();
                        });
                    </script>
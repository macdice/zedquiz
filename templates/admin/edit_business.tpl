{include file="admin/header.tpl"}

<form method="POST" action="save_business.php">
<input type="hidden" name="id" value="{$id}"/>
<table>
<tr>
<td>ID</td>
<td>{$id}</td>
</tr>
<tr>
<td>Display name</td>
<td><input name="display_name" type="text" value="{$record.display_name|escape}"/></td>
</tr>
<tr>
<td>Display URL</td>
<td><input name="display_url" type="text" value="{$record.display_url|escape}"/></td>
</tr>
<tr>
<td>Display phone</td>
<td><input name="display_phone" type="text" value="{$record.display_phone|escape}"/></td>
</tr>
<tr>
<td>Display email</td>
<td><input name="display_email" type="text" value="{$record.display_email|escape}"/></td>
</tr>
<tr>
<td>Company name</td>
<td><input name="company_name" type="text" value="{$record.company_name|escape}"/></td>
</tr>
<tr>
<td>Contact person</td>
<td><input name="contact_person" type="text" value="{$record.contact_person|escape}"/></td>
</tr>
<tr>
<td>Contact email</td>
<td><input name="contact_email" type="text" value="{$record.contact_email|escape}"/></td>
</tr>
<tr>
<td>Contact phone</td>
<td><input name="contact_phone" type="text" value="{$record.contact_phone|escape}"/></td>
</tr>
<tr>
<td>Facebook URL</td>
<td><input name="facebook_url" type="text" value="{$record.facebook_url|escape}"/></td>
</tr>
<tr>
<td>Twitter handle</td>
<td><input name="twitter_handle" type="text" value="{$record.twitter_handle|escape}"/></td>
</tr>
<tr>
<td>Logo URL</td>
<td><input name="logo_url" type="text" value="{$record.logo_url|escape}"/></td>
</tr>
<tr>
<td>Logo size</td>
<td><input name="logo_width" type="text" value="{$record.logo_width|escape}"/> x <input name="logo_height" type="text" value="{$record.logo_height|escape}"/>
</td>
</tr>
<tr>
<td>Postal address</td>
<td><input name="postal_address" type="text" value="{$record.postal_address|escape}"/></td>
</tr>
<tr>
<td>Postal city</td>
<td><input name="postal_city" type="text" value="{$record.postal_city|escape}"/></td>
</tr>
<tr>
<td>Postal postcode</td>
<td><input name="postal_postcode" type="text" value="{$record.postal_postcode|escape}"/></td>
</tr>
<tr>
<td>Region</td>
<td>
<select name="region">
{html_options values=$region_values output=$region_output selected=$record.region}
</select>
</td>
</tr>
<tr>
<td>Blurb</td>
<td><textarea name="blurb">{$record.blurb|escape}</textarea></td>
</tr>
</table>
<input type="submit" value="Save"/>
</form>

{include file="admin/footer.tpl"}

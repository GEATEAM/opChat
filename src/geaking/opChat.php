<?php 
	namespace geaking;
// §4✘ ↪ §


/************************Импорты******************/
	use pocketmine\utils\TextFormat as T;
	use pocketmine\level\particle\FlameParticle;
	use pocketmine\math\Vector3;
	use pocketmine\command\ConsoleCommandSender;
	use pocketmine\plugin\PluginManager;
	use pocketmine\item\enchantment\Enchantment;
	use pocketmine\level\Level;
	use pocketmine\event\player\PlayerItemHeldEvent;
	use pocketmine\event\player\PlayerInteractEvent;
	use pocketmine\level\sound\AnvilFallSound;
	use pocketmine\entity\Effect;
	use pocketmine\Player;
	use pocketmine\Server;
	use pocketmine\plugin\PluginBase;
	use pocketmine\event\Listener;
	use pocketmine\command\CommandSender;
	use pocketmine\command\Command;
	use pocketmine\lang\BaseLang;
    use pocketmine\item\Item;
    use pocketmine\inventory\PlayerInventory;
    use pocketmine\inventory\Inventory;
	use pocketmine\utils\Config;
	use onebone\economyapi\EconomyAPI;   
    /*************************Код*********************/
class opChat extends PluginBase implements Listener {

			public function onEnable() {
			$this->getLogger()->info("§2Плагин включен.");	
			$this->getLogger()->info("§2Создатель vk.com/easymanfifa");	
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {				
			switch ($cmd->getName()) { 
			case 'oc':
			if($sender->hasPermission('opchat.oc')){
			if(count($args) >= 1){
            if($sender instanceof Player){
             $text = implode(" ", $args);
             foreach ($this->getServer()->getOnlinePlayers() as $p) {
             if($p->hasPermission('opchat.oc')){
             	$prefix = '§7[§4АДМИН-ЧАТ§7]';
             	$pn = $p->getName();
             	$p->sendMessage($prefix.' §b'.$pn.': §f'.$text);
             }
             }
            }else{
            	$sender->sendMessage(T::RED.'Вы не можете использовать админ-чат в консоле!');
            }
			}else{
					$sender->sendMessage('Используй /oc <Сообщение>');
			}
			}else{
				    $sender->sendMessage(T::RED.'У вас нет прав на использования админ-чата!');
			}
				break;
			}
		}
}
?>
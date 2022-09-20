<?php

namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\ORM\TableRegistry;

/**
 * UserSeed command.
 */
class UserSeedCommand extends Command
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/3.0/en/console-and-shells/commands.html#defining-arguments-and-options
     *
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    public static function defaultName(): string
    {
        return 'userSeed';
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
//        $userTable = TableRegistry::getTableLocator()->get('user');
        $user = $this->Users->newEntity();

        $user->email = 'fadakargholamreza@gmail.com';
        $user->password = '1234';
        $user->nickname = 'Mr.Fadakar';
        $this->Users->save($user);
        $io->out("[ CREATED ][ USER ]\tfadakargholamreza@gmail.com ");
    }
}

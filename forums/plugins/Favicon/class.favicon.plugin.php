<?php if(!defined('APPLICATION')) exit();

//define plugin

$PluginInfo['Favicon'] = array(
    'Name' => 'Favicon',
    'Description' => 'Adds all the types of favicons needed for all types of devices and browsers. All you need to do is place the favicon images in the design folder of your theme. You can also upload the images from the dashboard thanks to Bleistvt',
    'Version' => '1.1',
    'MobileFriendly' => TRUE,
    'Author' => "VrijVlinder",
    'SettingsUrl' => '/settings/favicon',

);

//Send meta tags for favicons to head
class FaviconPlugin extends Gdn_Plugin {

    public function Base_Render_Before($Sender) {
        $Sender->Head->AddTag('link', array('rel' => 'shortcut icon', 'href' => $this->GetIcon('favicon.ico')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('favicon.png')));

        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-57x57.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-60x60.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-72x72.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-76x76.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-114x114.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-120x120.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-144x144.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-152x152.png')));
        $Sender->Head->AddTag('link', array('rel' => 'apple-touch-icon', 'href' => $this->GetIcon('apple-touch-icon-180x180.png')));

        $Sender->Head->AddTag('link', array('rel' => 'icon', 'href' => $this->GetIcon('favicon-196x196.png')));
        $Sender->Head->AddTag('link', array('rel' => 'icon', 'href' => $this->GetIcon('favicon-160x160.png')));
        $Sender->Head->AddTag('link', array('rel' => 'icon', 'href' => $this->GetIcon('favicon-96x96.png')));
        $Sender->Head->AddTag('link', array('rel' => 'icon', 'href' => $this->GetIcon('favicon-32x32.png')));
        $Sender->Head->AddTag('link', array('rel' => 'icon', 'href' => $this->GetIcon('favicon-16x16.png')));

        $Sender->Head->AddTag('meta', array('name' => 'msapplication-TileColor', 'content' => C('Favicon.TileColor', '#ffffff')));
        $Sender->Head->AddTag('meta', array('name' => 'msapplication-TileImage', 'content' =>  $this->GetIcon('mstile-144x144.png')));
    }

    //Get the uploaded icon. If no icon was uploaded, use the one from the theme folder instead.
    private function GetIcon($Filename) {
        $ThemePath = '/themes/' . C('Garden.Theme') . '/design/';
        $Config = 'Favicon.' . str_replace('.', '_', $Filename);
        if (C($Config)) {
            return Gdn_Upload::Url(C($Config));
        } else {
            return $ThemePath . $Filename;
        }
    }

    public function SettingsController_Favicon_Create($Sender) {
        $Sender->Permission('Garden.Settings.Manage');
        $Sender->SetData('Title', T('Favicon Upload'));
        $Sender->AddSideMenu('dashboard/settings/plugins');
        $Conf = new ConfigurationModule($Sender);
        $Conf->Initialize(array(
            'Favicon.favicon_ico' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon.ico'
            ),
            'Favicon.favicon_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon.png'
            ),
            'Favicon.apple-touch-icon_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon.png'
            ),
            'Favicon.apple-touch-icon-57x57_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-57x57.png'
            ),
            'Favicon.apple-touch-icon-60x60_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-60x60.png'
            ),
            'Favicon.apple-touch-icon-72x72_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-72x72.png'
            ),
            'Favicon.apple-touch-icon-76x76_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-76x76.png'
            ),
            'Favicon.apple-touch-icon-114x114_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-114x114.png'
            ),
            'Favicon.apple-touch-icon-120x120_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-120x120.png'
            ),
            'Favicon.apple-touch-icon-144x144_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-144x144.png'
            ),
            'Favicon.apple-touch-icon-152x152_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-152x152.png'
            ),
            'Favicon.apple-touch-icon-180x180_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'apple-touch-icon-180x180.png'
            ),
            'Favicon.favicon-196x196_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon-196x196.png'
            ),
            'Favicon.favicon-160x160_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon-160x160.png'
            ),
            'Favicon.favicon-96x96_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon-96x96.png'
            ),
            'Favicon.favicon-32x32_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon-32x32.png'
            ),
            'Favicon.favicon-16x16_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'favicon-16x16.png'
            ),
            'Favicon.mstile-144x144_png' => array(
                'Control' => 'imageupload',
                'LabelCode' => 'mstile-144x144.png'
            ),
            'Favicon.TileColor' => array(
                'Control' => 'textbox',
                'LabelCode' => 'Windows Tile Color',
                'Default' => C('Favicon.TileColor', '#ffffff')
            )
        ));
        $Conf->RenderAll();
    }

    public function Setup() {
    }
}
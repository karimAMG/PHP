import gi
import gtk
gi.require_version('Gtk','3.0')
from gi.repository import Gtk

class data(Gtk.Window):
    def __init__(self):
        Gtk.Window.__init__(self,title='Search')
        self.set_position(Gtk.WindowPosition.CENTER)
        self.set_icon_from_file('star.png')
        #windows size
        self.set_default_size(800,500)
        #label
        self.label = Gtk.Label()
        self.label2 = Gtk.Label('Data File')
        self.label3 = Gtk.Label('Search By')
        self.label4 = Gtk.Label()
        self.label5 = Gtk.Label()
        self.label6 = Gtk.Label()
        self.label.set_markup('<b>Search By File</b>')
        self.label4.set_markup('<b>Select Output Fields</b>')
        self.label5.set_markup('<b>Select Database</b>')
        self.label6.set_markup('<b>Search By Value</b>')
        #label part 2 Entry Inputs
        #Facebook Id
        self.label7 = Gtk.Label('Facebook Id')
        self.entry7 = Gtk.Entry()
        #Phone
        self.label8 = Gtk.Label('Phone')
        self.entry8 = Gtk.Entry()
        #First Name
        self.label9 = Gtk.Label('First Name')
        self.entry9 = Gtk.Entry()
        #Last Name
        self.label10 = Gtk.Label('Last Name')
        self.entry10 = Gtk.Entry()
        #E-mail
        self.label11 = Gtk.Label('E-mail')
        self.entry11 = Gtk.Entry()
        #Birthday
        self.label12 = Gtk.Label('Birthday')
        self.entry12 = Gtk.Entry()
        #Birthday Year
        self.label13 = Gtk.Label('Birthday Year')
        self.entry13 = Gtk.Entry()
        #Locale
        self.label14 = Gtk.Label('Locale')
        self.entry14 = Gtk.Entry()
        #Hometown
        self.label15 = Gtk.Label('Hometown')
        self.entry15 = Gtk.Entry()
        #Location
        self.label16 = Gtk.Label('Location')
        self.entry16 = Gtk.Entry()
        #Country
        self.label17 = Gtk.Label('Country')
        self.entry17 = Gtk.Entry()
        #Work
        self.label18 = Gtk.Label('Work')
        self.entry18 = Gtk.Entry()
        #Education
        self.label19 = Gtk.Label('Education')
        self.entry19 = Gtk.Entry()
        #Relationship
        self.label20 = Gtk.Label('Relationship')
        self.entry20 = Gtk.Entry()
        #Religion
        self.label21 = Gtk.Label('Religion')
        self.entry21 = Gtk.Entry()
        #About Me
        self.label22 = Gtk.Label('About Me')
        self.entry22 = Gtk.Entry()
        #Gender
        self.label23 = Gtk.Label('Gender')
        self.entry23 = Gtk.Entry()
        #Limit
        self.label24 = Gtk.Label('Limit')
        self.entry24 = Gtk.Entry()
        
        self.fixed = Gtk.Fixed()
        #button
        self.btn = Gtk.Button('Select File')
        self.btn2 = Gtk.Button('Search')
        self.btn3 = Gtk.Button('Search')
        
        self.btn7 = Gtk.Button('...')
        self.btn8 = Gtk.Button('...')
        self.btn9 = Gtk.Button('...')
        self.btn10 = Gtk.Button('...')
        self.btn11 = Gtk.Button('...')
        self.btn12 = Gtk.Button('...')
        self.btn13 = Gtk.Button('...')
        self.btn14 = Gtk.Button('...')
        self.btn15 = Gtk.Button('...')
        self.btn16 = Gtk.Button('...')
        self.btn17 = Gtk.Button('...')
        self.btn18 = Gtk.Button('...')
        self.btn19 = Gtk.Button('...')
        self.btn20 = Gtk.Button('...')
        self.btn21 = Gtk.Button('...')
        self.btn22 = Gtk.Button('...')
        
        #button set_property
        self.btn2.set_property("width-request",100)
        self.btn3.set_property("width-request",120)
        #button connect
        self.btn.connect('clicked',self.select_file)
        self.btn2.connect('clicked',self.Search)
        self.btn3.connect('clicked',self.Search2)
        #radio button
        self.radiobtn = Gtk.RadioButton()
        self.radiobtn2 = Gtk.RadioButton.new_from_widget(self.radiobtn)
        self.radiobtn.connect('toggled',self.radiobtn_action)
        self.radiobtn2.connect('toggled',self.radiobtn_action)
        self.radiobtn.set_label('ID')
        self.radiobtn2.set_label('Phone')
        #check box
        #[y]facebook id
        self.cbx = Gtk.CheckButton()
        self.cbx.set_label('Facebook id')
        self.cbx.connect('toggled',self.cbx_action)
        #[x]Phone
        self.cbx2 = Gtk.CheckButton()
        self.cbx2.set_label('Phone')
        self.cbx2.connect('toggled',self.cbx_action)
        #[x]First Name
        self.cbx3 = Gtk.CheckButton()
        self.cbx3.set_label('First Name')
        self.cbx3.connect('toggled',self.cbx_action)
        #[y]Last Name
        self.cbx4 = Gtk.CheckButton()
        self.cbx4.set_label('Last Name')
        self.cbx4.connect('toggled',self.cbx_action)
        #[x]E-mail
        self.cbx5 = Gtk.CheckButton()
        self.cbx5.set_label('E-mail')
        self.cbx5.connect('toggled',self.cbx_action)
        #[x]Bithday
        self.cbx6 = Gtk.CheckButton()
        self.cbx6.set_label('Bithday')
        self.cbx6.connect('toggled',self.cbx_action)
        #[y]Bithday Year
        self.cbx7 = Gtk.CheckButton()
        self.cbx7.set_label('Bithday Year')
        self.cbx7.connect('toggled',self.cbx_action)
        #[x]Gender
        self.cbx8 = Gtk.CheckButton()
        self.cbx8.set_label('Gender')
        self.cbx8.connect('toggled',self.cbx_action)
        #[x]Local
        self.cbx9 = Gtk.CheckButton()
        self.cbx9.set_label('Local')
        self.cbx9.connect('toggled',self.cbx_action)
        #[y]Hometown
        self.cbx10 = Gtk.CheckButton()
        self.cbx10.set_label('Hometown')
        self.cbx10.connect('toggled',self.cbx_action)
        #[x]Location
        self.cbx11 = Gtk.CheckButton()
        self.cbx11.set_label('Location')
        self.cbx11.connect('toggled',self.cbx_action)
        #[x]Country
        self.cbx12 = Gtk.CheckButton()
        self.cbx12.set_label('Country')
        self.cbx12.connect('toggled',self.cbx_action)
        #[y]Work
        self.cbx13 = Gtk.CheckButton()
        self.cbx13.set_label('Work')
        self.cbx13.connect('toggled',self.cbx_action)
        #[x]Education
        self.cbx14 = Gtk.CheckButton()
        self.cbx14.set_label('Education')
        self.cbx14.connect('toggled',self.cbx_action)
        #[x]Relationship
        self.cbx15 = Gtk.CheckButton()
        self.cbx15.set_label('Relationship')
        self.cbx15.connect('toggled',self.cbx_action)
        #[y]Religion
        self.cbx16 = Gtk.CheckButton()
        self.cbx16.set_label('Religion')
        self.cbx16.connect('toggled',self.cbx_action)
        #[x]About Me
        # fixed
        self.fixed.put(self.label,40,10)
        self.fixed.put(self.label2,40,40)
        self.fixed.put(self.label3,40,80)
        self.fixed.put(self.btn,300,40)
        self.fixed.put(self.radiobtn,200,80)
        self.fixed.put(self.radiobtn2,300,80)
        self.fixed.put(self.btn2,160,110)
        self.fixed.put(self.label4,40,150)
        self.fixed.put(self.cbx,30,180)
        self.fixed.put(self.cbx2,140,180)
        self.fixed.put(self.cbx3,250,180)
        self.fixed.put(self.cbx4,30,203)
        self.fixed.put(self.cbx5,140,203)
        self.fixed.put(self.cbx6,250,203)
        self.fixed.put(self.cbx7,30,226)
        self.fixed.put(self.cbx8,140,226)
        self.fixed.put(self.cbx9,250,226)
        self.fixed.put(self.cbx10,30,249)
        self.fixed.put(self.cbx11,140,249)
        self.fixed.put(self.cbx12,250,249)
        self.fixed.put(self.cbx13,30,272)
        self.fixed.put(self.cbx14,140,272)
        self.fixed.put(self.cbx15,250,272)
        self.fixed.put(self.cbx16,30,295)
        self.fixed.put(self.label5,35,325)
        self.fixed.put(self.label6,450,10)
        
        self.fixed.put(self.label7,450,40)
        self.fixed.put(self.label8,450,60)
        self.fixed.put(self.label9,450,80)
        self.fixed.put(self.label10,450,100)
        self.fixed.put(self.label11,450,120)
        self.fixed.put(self.label12,450,140)
        self.fixed.put(self.label13,450,160)
        self.fixed.put(self.label14,450,180)
        self.fixed.put(self.label15,450,200)
        self.fixed.put(self.label16,450,220)
        self.fixed.put(self.label17,450,240)
        self.fixed.put(self.label18,450,260)
        self.fixed.put(self.label19,450,280)
        self.fixed.put(self.label20,450,300)
        self.fixed.put(self.label21,450,320)
        self.fixed.put(self.label22,450,340)
        self.fixed.put(self.label23,450,360)
        self.fixed.put(self.label24,450,380)
        lists = [
             "ALL",
            "Mal",
            "Femal",
        ]
        CBT= Gtk.ComboBoxText()
        CBT.set_entry_text_column(0)
        CBT.connect('changed',self.select_action)
        for list in lists:
            CBT.append_text(list)

        CBT.set_active(0)
        CBT.set_property("width-request",168)
        self.fixed.put(self.entry7,570,40)
        self.fixed.put(self.entry8,570,60)
        self.fixed.put(self.entry9,570,80)
        self.fixed.put(self.entry10,570,100)
        self.fixed.put(self.entry11,570,120)
        self.fixed.put(self.entry12,570,140)
        self.fixed.put(self.entry13,570,160)
        self.fixed.put(self.entry14,570,180)
        self.fixed.put(self.entry15,570,200)
        self.fixed.put(self.entry16,570,220)
        self.fixed.put(self.entry17,570,240)
        self.fixed.put(self.entry18,570,260)
        self.fixed.put(self.entry19,570,280)
        self.fixed.put(self.entry20,570,300)
        self.fixed.put(self.entry21,570,320)
        self.fixed.put(self.entry22,570,340)
        self.fixed.put(CBT,570,360) # select input not the input text
        self.fixed.put(self.entry24,570,380)
        self.fixed.put(self.btn3,600,430)
        
        
        self.fixed.put(self.btn7,735,40)
        self.fixed.put(self.btn8,735,60)
        self.fixed.put(self.btn9,735,80)
        self.fixed.put(self.btn10,735,100)
        self.fixed.put(self.btn11,735,120)
        self.fixed.put(self.btn12,735,140)
        self.fixed.put(self.btn13,735,160)
        self.fixed.put(self.btn14,735,180)
        self.fixed.put(self.btn15,735,200)
        self.fixed.put(self.btn16,735,220)
        self.fixed.put(self.btn17,735,240)
        self.fixed.put(self.btn18,735,260)
        self.fixed.put(self.btn19,735,280)
        self.fixed.put(self.btn20,735,300)
        self.fixed.put(self.btn21,735,320)
        self.fixed.put(self.btn22,735,340)
        
        #treeview
        self.liststore = Gtk.ListStore(str)
        self.liststore.append(['file.db'])
        self.treeview = Gtk.TreeView(model=self.liststore)
        self.cell_renderer_text = Gtk.CellRendererText()
        self.tvc = Gtk.TreeViewColumn(None,self.cell_renderer_text,text=0)
        self.tvc.set_sizing(Gtk.TreeViewColumnSizing.FIXED)
        self.tvc.set_fixed_width(340)
        self.tvc.set_resizable(True)
        self.tvc.set_reorderable(True)
        #self.tvc.set_min_width(280)
        #self.tvc.set_vexpand(True)
        self.tvc.set_expand(True)
        self.treeview.append_column(self.tvc)
        self.selection = self.treeview.get_selection()
        self.selection.connect("changed", self.selection_action)
        self.scroll = Gtk.ScrolledWindow () # 1
        self.scroll.add (self.treeview)         # 2
        self.scroll.set_policy (Gtk.PolicyType.NEVER, Gtk.PolicyType.AUTOMATIC)
        self.scroll.set_min_content_height(120)
        self.fixed.put(self.scroll,35,355)
        self.add(self.fixed)
        
    def select_file(self,button):
        print ('select file')
    def select_action(self,combo):
        text = combo.get_active_text()
        if text is not None:
            print(text)
    def radiobtn_action(self,button):
        print (button.get_label())
    def Search(self,button):
        print ('search')
    def Search2(self,button):
        print ('search')
    def cbx_action(self,button):
        print (str(button.get_label())+' '+str(button.get_active()))
    def selection_action(self,selection):
        (model,iter) =  selection.get_selected()
        if iter is not None:
            print (model[iter][0])
        else:
            print ('')
        return True
call = data()
# On Exit
call.connect('destroy',Gtk.main_quit)
# on display
call.show_all()
Gtk.main()

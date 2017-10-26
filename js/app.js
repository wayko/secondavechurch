(function(){
    //***************//
	//main app module//
	//***************//
	var app = angular.module('SACNYC',['pascalprecht.translate','ngCart','ui.bootstrap']);
	
	
	//---------------//
	//shopping cart  //
	//---------------//
	
	app.filter('myFilter', function () {
        return function (items, count) {
            var result = [];
            for (var i = 0; i < items.length && result.length < count; ++i) {
                if (items[i].available > 0) result.push(items[i]);
            }
            return result;
        };
    });
app.controller("ItemsController",['ngCart', '$scope',  function(ngCart, $scope){
	
	ngCart.setTaxRate(0.00);
    ngCart.setShipping(0.00); 
	this.items = allItems;
	$scope.itemsPerListing = 3;
	var shifteditem = [];
	var shifteditems = [];
	var counter;
$scope.nextitem = function () {
	  this.items = allItems;
		if($scope.itemsPerListing >= this.items.length)
		{
			$scope.itemsPerListing =  this.items.length;
			console.log($scope.itemsPerListing);
		}
		else
		{
		shifteditem.push( $scope.items.shift());
		counter = shifteditem.length;
		 console.log(this.items.length);
		 if (counter > $scope.itemsPerListing)
		 {
			 counter  = this.items.length + 2;
			
		 }
		}		 
  };
 
$scope.previtem = function() {
	this.items = allItems;
	
	if(counter > 0){
		$scope.items.unshift(shifteditem[counter-1]);
		counter = counter - 1;
		console.log(counter);
	}	
};
}]);
var allItems = [
{
	id:0,
	name: "$5.00 Donation",
	price: 5.00,
	available: 1
},
{
	id:1,
	name: "$10.00 Donation",
	price: 10.00,
	available: 1
}
];
//---end--//
	
	
	
	
	//*********************//
	//navigation controller//
	//********************//
	app.controller('NavigationController', function(){
		this.navigations = navItems;
	});
	//****************//
	//navigation array//
	//****************//
	var navItems = [
		{
			name: "Home",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#top"
		},
		{
			name: "About",
			classinfo:"class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'",
			dropdownli:[
							{
							  li1:"Hands on project experiences",
							  li2:"Work as a team with other students and members",
							  li3:"Resources",
							  li4:"Access to academic help from STEM mentors, professors, and students.",
							  li5:"Events",
							  li6:"For a complete list of events please email us."
							}
					   ],
			location: "#"
		},
		{
			name: "Visit",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#visit"
		},
		{
			name: "What We Believe",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#corevalues"
		},
		
		{
			name: "Contact Us",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#contactus"
		},
		{
			name: "Special Announcements",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#special"
		},
		{
			name: "Donations",
			classinfo:"",
			dropdownli:[
							{
							  li1:"",
							  li2:"",
							  li3:"",
							  li4:"",
							  li5:"",
							  li6:""
							}
					   ],
			location: "#donations"
		}
	];
	//****************************//
	//Level One Section controller//
	//****************************//
	app.controller('LevelOneController',function(){
		this.item = levelOne;
	});
	//***************//
	//level one items//
	//**************//
	var levelOne = {
	images: "img/IMG_82282.jpg",
	companyWelcome: "Welcome To DreamCPU." 
	}
	
	//****************************//
	//Level Two Section controller//
	//****************************//
	app.controller('LevelTwoController',function(){
		this.item = levelTwo;
	});
	//**********************//
	//level two array items//
	//********************//
var levelTwo =
{
	images: "img/IMG_82872.JPG"	
}

/* app.controller('LevelThreeController',function(){
		this.items = levelThree;
	});

var levelThree = [

]; */
app.controller('LevelFourController',function(){
		this.items = levelFour;
	});

var levelFour = [
{
	title: "test1",
	boxes: "boxes1"
	
},
{
	title: "test2",
	boxes: "boxes2"
}
];
app.config(function($translateProvider){
$translateProvider.translations('en',{
QUESTION:'What is your native language?',
BUTTON_LANG_EN:'english',
BUTTON_LANG_ES:'spanish',
whatWeBelieve:"What We Believe",
serviceSched:"Service Schedule",
sacCMA:"Second Avenue Church is a part of the Christian Missionary Alliance.",
sacMoreInfo:'If you would like more information please visit the website',
lostPeople: "Lost People",
lostPeopleTitle: "Lost people matter to God. He wants them found.",
lostPeoplemessage: "In the formative years of our movement, the Holy Spirit instilled within A. B. Simpson a passion to reach people with no knowledge of Jesus Christ in his “Jerusalem” and around the world. That passion still lives within The Alliance today.",
prayer: "Prayer",
prayerTitle: "Prayer is the primary work of God’s people.",
prayerMessage: "We believe that nothing of lasting value can be done unless it is bathed in prayer. So passionate was his belief that prayer undergirds all ministries, Alliance founder A. B. Simpson was compelled to create a prayer league to focus on the world’s evangelization. He believed that the Prayer Alliance would “prove to be the mightiest force in the spread of missions;” that force still drives The Alliance today.",
god: "God’s Word",
gogTitle: "Knowing and obeying God’s Word is fundamental to all true success.",
godmessage: 'If The Alliance had a "life application" verse, it would be Matthew 28:19: Therefore go and make disciples of all nations, baptizing them in the name of the Father and of the Son and of the Holy Spirit—AKA The Great Commission! But the next verse is equally important: ". . . and teaching them to obey everything I have commanded you." ',
stewardship: "Stewardship",
stewardshipTitle: "Everything we have belongs to God. We are His stewards.",
stewardshipMessage: "This core value is intrinsic to the nature and structure of The Alliance—we teach and practice the blessing and effectiveness of the faith principle of giving as Scripture encourages us to remember that it’s not the amount of money we have or how much we give—it’s recognizing that everything we have comes from God (Luke 21:1–4).",
simpleTitle: "Empowered",
fullTitle: "Without the Holy Spirit’s empowerment, we can accomplish nothing.",
message: "The Apostle Paul said, My message and my preaching were not with wise and persuasive words, but with a demonstration of the Spirit’s power, so that your faith might not rest on men’s wisdom, but on God’s power (1 Corinthians 2:4–5). This is the fiber of our being as believers and the sixth of our Alliance core values.",
greatCommission:"Great Commission",
greatTitle:"Completing the Great Commission will require the mobilization of every fully devoted disciple.",
greatMessage:"In The Christian and Missionary Alliance the first priority of every minister, congregation, and believer is to work for the evangelization of the world. Healthy churches producing healthy disciples devoted to reaching lost people—this is what will hasten the completion of the Great Commission and the return of Jesus Christ.",
faith:"Faith-Filled Risk",
faithTitle:"Achieving God’s purposes means taking faith-filled risks. This always involves change.",
faithMessage:"For more than a century, Alliance workers have braved harsh and dangerous territory—often at great personal risk—to take the good news of Jesus to a lost world. These workers experienced this Alliance Core Value— 'Achieving God’s purposes means taking faith-filled risks. This always involves change.' Because of the selfless dedication of Alliance workers who were willing to lay down their lives for the gospel, entire people groups now know Jesus.",
contactUs:"Contact Us",
prayerRequest:"Prayer Request",
name:"name",
email:"email",
subject:"subject",
messages:"message",
sendMessage:"Send Message",
clearForm:"Clear Form"
});
$translateProvider.translations('es',{
QUESTION:'\xBFCu\xE1l es tu idioma nativo?',
BUTTON_LANG_EN:'ingl\xE9s',
BUTTON_LANG_ES:'espa\xF1ol',
whatWeBelieve:"Lo Que Creemos",
serviceSched:"Programar Servicio",
sacCMA:"En segundo lugar Church Avenue es una parte de la Alianza Misionera Cristiana.",
sacMoreInfo:'Si desea más información, visite el sitio web',
lostPeople: "Personas Perdidas",
lostPeopleTitle: "Los perdidos son importantes para Dios . Él quiere que ellos encontraron .",
lostPeoplemessage: "En los años formativos de nuestro movimiento , el Espíritu Santo infundió en A. B. Simpson una pasión para llegar a personas que no tienen conocimiento de Jesucristo en su  Jerusalén  y en todo el mundo. Esa pasión todavía vive dentro de la Alianza en la actualidad.",
prayer: "Oración",
prayerTitle: "La oración es el trabajo principal del pueblo de Dios.",
prayerMessage: "Nosotros creemos que nada de valor duradero se puede hacer a menos que se bañó en la oración . Tan apasionado era su creencia de que la oración subyace a todos los ministerios , Alianza fundador A. B. Simpson se vio obligado a crear una liga de oración para centrarse en la evangelización del mundo . Se cree que la Alianza Oración sería 'llegar a ser la fuerza más poderosa de la propagación de las misiones; ' esa fuerza todavía conduce La Alianza hoy.",
stewardship: "Administración",
stewardshipTitle: "Todo lo que tenemos le pertenece a Dios . Somos sus mayordomos.",
stewardshipMessage: "Este valor central es intrínseca a la naturaleza y estructura de la Alianza que enseñamos y practicamos la bendición y la eficacia del principio de la fe de dar como Escritura nos anima a recordar que no es la cantidad de dinero que tenemos o cuánto damos - es reconociendo que todo lo que tenemos viene de Dios ( Lucas 21 : 1-4 ).",
god: "La Palabra de Dios",
gogTitle: "Conocer y obedecer la Palabra de Dios es la base de todo verdadero éxito .",
godmessage: 'Si la Alianza había un verso "aplicación a la vida", que sería Mateo 28:19 : Por tanto, id y haced discípulos a todas las naciones , bautizándolos en el nombre del Padre y del Hijo y del Espíritu Santo, conocido como La Gran Comisión ! Pero el siguiente verso es igualmente importante : " enseñándoles que guarden todas las cosas que os he mandado . . . . "',
simpleTitle:"Facultado",
fullTitle: "Sin potenciación del Espíritu Santo, podemos lograr nada.",
message: "El Apóstol Pablo dijo: Mi mensaje ni mi predicación fue con palabras persuasivas de humana sabiduría , sino con demostración del poder del Espíritu , para que vuestra fe no esté fundada en la sabiduría de los hombres , sino en el poder de Dios ( 1 Corintios 2 : 4-5 ) . Esta es la fibra de nuestro ser como creyentes y la sexta parte de nuestros valores fundamentales de la Alianza.",
greatCommission:"Gran Comisión",
greatTitle:"Finalización de la Gran Comisión requerirá la movilización de todo discípulo totalmente dedicado .",
greatMessage:"En La Alianza Cristiana y Misionera la primera prioridad de cada ministro , congregación, y el creyente es trabajar por la evangelización del mundo . Las iglesias saludables que producen discípulos saludables dedicadas a llegar a las personas de este perdidos es lo que va a acelerar el cumplimiento de la Gran Comisión y el retorno de Jesucristo .",
faith:"Riesgo llena de fe",
faithTitle:"El logro de los propósitos de Dios significa tomar riesgos llenos de fe . Esto siempre implica cambio.",
faithMessage:'Durante más de un siglo , los trabajadores de la Alianza han enfrentado a duras y peligrosas territorio a menudo con gran riesgo personal , para llevar las buenas nuevas de Jesús a un mundo perdido . Estos trabajadores experimentaron esta Alianza Core Value- "El logro de los propósitos de Dios significa tomar riesgos llenos de fe . Esto siempre implica un cambio . " Debido a la dedicación desinteresada de los obreros de la Alianza que estaban dispuestos a dar su vida por el Evangelio , la totalidad de los grupos de personas que ahora conocen a Jesús .',
contactUs:"Contáctenos",
prayerRequest:"Petición de oración",
name:"nombre",
email:"correo electrónico",
subject:"tema",
messages:"mensaje",
sendMessage:"Enviar mensaje",
clearForm:"Forma clara"
});
$translateProvider.useSanitizeValueStrategy('escape');
$translateProvider.preferredLanguage('en');
});

app.controller('Ctrl',['$scope','$translate',function($scope, $translate){
	$scope.changeLanguage = function(key){
		$translate.use(key);
	};
}]);




})();
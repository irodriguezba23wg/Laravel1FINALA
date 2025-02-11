+----------+           +----------+
| ikasleak |---<N:M>---| Moduluak |
+----------+           +----------+

ikasleak:
- id: zenbaki osoa
- izena: testua
- abizena: testua
- jaiotze_data: data

moduluak:
- id: zenbaki osoa
- izena: testua
- gela: data
Eginbeharra:

Logina garatu: Erabiltzaileen erregistroa, login, logout.

'Modulu' CRUD eragiketak egin

API ruta hauek sortu:

   - GET /api/moduluak : modulu guztien zerrenda
   - GET /api/ikasleak : ikasle guztien zerrenda. 'irakasle' rola behar da

   - GET /api/ikaslemoduluak : logeatua dagoen ikaslearen moduluen zerrenda
   - POST /api/matrikulatu/{modulua} : logeatua dagoen ikaslea 'modulua'-n matrikulatu
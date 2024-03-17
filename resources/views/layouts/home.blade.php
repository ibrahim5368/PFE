<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Requêtes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex flex-col">
    <div class="flex-grow flex">
        <aside class="bg-gray-800 text-white w-1/6 flex-shrink-0">
            <div class="flex flex-col justify-between h-full">
                <ul class="space-y-2 px-4 py-4">
                    <li><a href="#" class="text-xl hover:bg-gray-700">Insertion</a></li>
                </ul>
                <button class="logout-btn flex items-center p-2 m-4 rounded-md">
    <img src="images/logout-02-stroke-rounded.jpg" alt="Logout Icon" class="w-6 h-6 mr-2">
    <span>Logout</span>
</button>

            </div>
        </aside>
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-md flex-grow">
            <h4 class="text-lg font-semibold mb-4">Ajout de Requêtes</h4>
            <div class="form-container">
                <form action="#" method="post">
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div class="flex items-center">
                            <label for="IdP" class="text-gray-700 mr-2">ID Projet:</label>
                            <input type="text" id="IdP" name="IdProjet" class="form-input w-full mt-1"
                                placeholder="Entrer le numéro de projet">
                        </div>
                        <div class="flex items-center">
                            <label for="Vp" class="text-gray-700 mr-2">Version:</label>
                            <input type="text" id="Vp" name="VersionProjet" class="form-input w-full mt-1"
                                placeholder="Entrer une version">
                        </div>
                        <div>
                            <label for="SQLR" class="text-gray-700 block mb-2">Requêtes SQL:</label>
                            <textarea id="SQLR" name="SQLRequetes" class="form-textarea w-full h-32 mt-1"
                                placeholder="Entrer les requêtes SQL"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="enregistrer-btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-full">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

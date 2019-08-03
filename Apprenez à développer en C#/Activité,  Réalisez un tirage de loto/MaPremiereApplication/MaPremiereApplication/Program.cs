using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MaPremiereApplication
{
    class Program
    {
        static Random random = new Random(); // Initialisation de la classe random au début pour eviter d'avoir les même numéro
        static int[] numbers = new int[7]; // Tableau à 7 valeurs
        static void Main(string[] args)
        {
            for (int i = 0; i < numbers.Length; i++) // Boucle qui permet de rentrer les valeurs dans le tableau
            {
                numbers[i] = NumberAleatory(1, 49); // Fonction avec chiffre aléatoire entre 1 et 49
            }
            DisplayArray(); // Affiche le tableau
        }
        static int NumberAleatory(int minRandom, int maxRandom)
        {
            int randomNumber;
            bool isRandomNumberDifferent = false; // Boolean pour verifier si le chiffre est égal a un chiffre dans le tableau
            do
            {
                randomNumber = random.Next(minRandom, maxRandom); // Chiffre aléatoire
                for (int i = 0; i < numbers.Length; i++)// Vérifie le chiffre random avec tout le tableau
                {
                    if (randomNumber == numbers[i]) // Si mon chiffre random est égale a une valeur dans le tableau, alors on sort de la boucle for
                    {
                        isRandomNumberDifferent = false;
                        break;
                    }
                    else { isRandomNumberDifferent = true; }
                }
            }
            while (isRandomNumberDifferent == false); // Vérifie si le numéro est different
            return randomNumber;
        }

        static void DisplayArray()
        {
            for (int i = 0; i < numbers.Length; i++)
            {
                Console.WriteLine("Tableau index " + i + " avec valeur " + numbers[i]);
            }
        }
    }
}

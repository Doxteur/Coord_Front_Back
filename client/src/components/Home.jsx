import React, { useEffect, useState } from "react";
import { REACT_API_URL } from "../utils/config";
import axios from "axios";

function Home() {
  const [patients, setPatients] = useState();
  const [patient, setPatient] = useState();

  const [maladies, setMaladies] = useState();
  const [maladie, setMaladie] = useState();

  const [chambres, setChambres] = useState();
  const [chambre, setChambre] = useState();

  const [medecins, setMedecins] = useState();
  const [medecin, setMedecin] = useState();

  // available chambre
  const [availableChambres, setAvailableChambres] = useState();

  useEffect(() => {
    axios
      .get(`${REACT_API_URL}/medecins`)
      .then((res) => {
        setMedecins(res.data);
      })
      .catch((err) => {
        console.log(err);
      });

    // now get patients
    axios
      .get(`${REACT_API_URL}/patients`)
      .then((res) => {
        setPatients(res.data);
      })
      .catch((err) => {
        console.log(err);
      });

    // now get maladies
    axios
      .get(`${REACT_API_URL}/maladies`)
      .then((res) => {
        setMaladies(res.data);
      })
      .catch((err) => {
        console.log(err);
      });

    // now get chambres
    axios
      .get(`${REACT_API_URL}/chambres`)
      .then((res) => {
        setChambres(res.data);
      })
      .catch((err) => {
        console.log(err);
      });

    // now get available chambres
    axios
      .get(`${REACT_API_URL}/chambres/disponibles`)
      .then((res) => {
        setAvailableChambres(res.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }, []);

  // Affect a chambre to a patient
  const affecterChambre = () => {
    const patientId = parseInt(document.getElementById("patients").value);
    const chambreId = parseInt(
      document.getElementById("availableChambres").value
    );

    axios
      .post(`${REACT_API_URL}/patients/${patientId}/chambres`, {
        chambre_id: chambreId,
      })
      .then((res) => {
        console.log(res.data);
        window.location.reload();
      })
      .catch((err) => {
        console.log(err);
      });
  };

  return (
    <div>
      {/* Select */}
      <div className="relative w-1/4 m-4">
        <h1>Medecins</h1>
        <select
          id="medecins"
          className="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          {/* Map on medecins */}
          {medecins &&
            medecins.map((medecin) => {
              return (
                <option key={medecin.id} value={medecin.id}>
                  {medecin.nom} {medecin.prenom}
                </option>
              );
            })}
        </select>

        <h1>Patients</h1>
        <select
          id="patients"
          className="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          {patients &&
            patients.map((patient) => {
              return (
                <option key={patient.id} value={patient.id}>
                  Nom : {patient.nom} - Maladie : {patient.maladie.nom}
                  { patient.chambre && patient.chambre.numero &&
                    <span> - Chambre : {patient.chambre.numero}</span>
                  }
                </option>
              );
            })}
        </select>

        <h1>Maladies</h1>
        <select
          id="maladies"
          className="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          {maladies &&
            maladies.map((maladie) => {
              return (
                <option key={maladie.id} value={maladie.id}>
                  {maladie.nom}
                </option>
              );
            })}
        </select>

        <h1>Chambres</h1>
        <select
          id="chambres"
          className="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          {chambres &&
            chambres.map((chambre) => {
              return (
                <option key={chambre.id} value={chambre.id}>
                  {chambre.numero}
                </option>
              );
            })}
        </select>

        <h1>Chambres disponibles</h1>
        <select
          id="availableChambres"
          className="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          {availableChambres &&
            availableChambres.map((chambre) => {
              return (
                <option key={chambre.id} value={chambre.id}>
                  Numero: {chambre.numero} - Places disponible:{" "}
                  {chambre.nb_lits - chambre.nb_lits_occupes}
                </option>
              );
            })}
        </select>
        <button
          onClick={affecterChambre}
          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
          Affecter chambre
        </button>
      </div>
    </div>
  );
}

export default Home;

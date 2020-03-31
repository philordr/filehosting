**Steps to clone the repository**

Install [git](https://gitforwindows.org)
After successful installation, open cmd and go where you want to store the codes. Ex: C:/xampp/htdocs
Then type this command
*git clone https://KuradWorks@bitbucket.org/KuradWorks/filehosting.git*

---

## Pushing a changes

1. Open TERMINAL using vs code.
2. Make sure that you are on the correct directory.
3. Type this code *git status*.
4. You will see the list of file that are edited.
5. Then type this code *git add (name of file). Ex: git add index.php*.
6. Then commit the changes and add message on it *git commit -m "Sample message"*.
6. The *git push* to push the code to the repository.

---

## Pulling the codes

1. Make sure that you don't have edited a file by typing this code *git status*. If you have current changes you can push it to the repository or remove the changes by this code *git checkout -- (name of file)*.
2. Fetch the edited file *git fetch --all*.
3. Then Pull *git pull*.


Powered by Quattuor Software
*edited by Carlo*